<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Models\Language;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class MealsController extends Controller
{
    public function index(Request $request) {
        //poziv funkcije za validaciju parametra lang
        if(MealsController::langCheck($request) !== true) {
            return MealsController::langCheck($request);
        }

        //postavljanje default per_page i broja stranice
        $per_page = intval($request->input('per_page', 5));
        $current_page = intval($request->input('page', 1));

        $query = Meal::query();

        //pretraga po id-u meala
        if ($request->has('id')) {
            if (is_numeric($request->input('id')) && $request->input('id') > 0) {
                $query->where('id', $request->input('id'));
            } else {
                return Response::json(['error' => 'Provided "id" is not in valid format.', 'greška' => 'Pogrešan format parametra "id".', 'erreur' => 'Le paramètre "id" n\'est pas dans un format valide.'], 400);
            }
        }

        //filtriranje po id-u tagova
        if ($request->has('tags')) {
            $tags = $request->input('tags');
            if (empty($tags)) {
                return Response::json(['error' => 'Provided parameter "tags" is missing arguments.', 'greška' => 'Parametru "tags" nedostaju argumenti.', 'erreur' => 'Le paramètre fourni "tags" manque d\'arguments'], 400);
            }
            $tags = explode(',', $tags);
            $query->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('tag_id', $tags);
                })->get();  
        }

        //filtriranje po id-u kategorija
        if ($request->has('category')) {
            $category = $request->input('category');
            if (empty($category)) {
                return Response::json(['error' => 'Provided parameter "category" is missing arguments.', 'greška' => 'Parametru "category" nedostaju argumenti.', 'erreur' => 'Le paramètre fourni "category" manque d\'arguments'], 400);
            }

            if (is_numeric($category)) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('id', $category);
                });
            } else if (strtoupper($category) === 'NULL') {
                $query->whereNull('category_id');
            } else if ($category === '!NULL') {
                $query->whereNotNull('category_id');
            };
        }

        //učitavanje atributa ovisno o with parametru
        if ($request->has('with')) {
            $with = $request->input('with');
            if (empty($with)) {
                return Response::json(['error' => 'Provided parameter "with" is missing arguments.', 'greška' => 'Parametru "with" nedostaju argumenti.', 'erreur' => 'Le paramètre fourni "with" manque d\'arguments'], 400);
            }
            $with = $request->input('with');
            $with = explode(',', $with);
            $query->with($with);
        }

        //filtriranje po parametru diff_time
        if ($request->has('diff_time')) {
            $diff_time = $request->input('diff_time');
                if (is_numeric($diff_time) && $diff_time > 0) {
                $query->withTrashed()
                    ->where('created_at', '>', date('Y-m-d H:i:s', $diff_time))
                    ->where('updated_at', '>', date('Y-m-d H:i:s', $diff_time));
            } else {
                return Response::json(['error' => 'Provided "diff_time" is not in valid format.', 'greška' => 'Pogrešan format parametra "diff_time".', 'erreur' => 'Le paramètre "diff_time" n\'est pas dans un format valide.'], 400);
            }
        }
        
        //paginacija
        $meals = $query->paginate($per_page);
        $mealsCollection = MealResource::collection($meals);

        $meta = [
            'currentPage' => $meals->currentPage(),
            'totalItems' => $meals->total(),
            'itemsPerPage' => intval($per_page),
            'totalPages' => $meals->lastPage(),
        ];

        $links = [
            'prev' => $meals->withQueryString()->previousPageUrl(),
            'next' => $meals->withQueryString()->nextPageUrl(),
            'self' => URL::full()
        ];

        $response = [
            'meta' => $meta,
            'data' => $mealsCollection,
            'links' => $links,
        ];
        
        return response()->json($response, 200 );
    }

    //funkcija za validaciju parametra lang
    function langCheck(Request $request){
        //provjera postojanja parametra jezika ('lang')
        if (!$request->has('lang')) {
            return Response::json(['error' => 'The "lang" query parameter is required.', 'greška' => 'Parametar jezika "lang" nije unešen.', 'erreur' => 'Le paramètre de requête "lang" est requis.'], 400);
        }
        //provjera ako je jezik podržan
        elseif ($request->has('lang')) {
            $languageExists = Language::where('lang', $request->input('lang'))->exists();
            if (!$languageExists) {
                $languages = Language::get();
                return Response::json(['error' => 'Required language is not supported.', 'greška' => 'Traženi jezik nije podržan.', 'erreur' => 'La langue requise n\'est pas prise en charge.', 'Supported languages are' => $languages], 400);
            } else {
                return true;
            }
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function show(string $id)
    {
        $meal = Meal::find($id);
        return new MealResource($meal);
    }

    /**
     * Obriši meal po danom id-u.
     */
    public function delete(string $id)
    {
        $meal = Meal::find($id);
        $meal->delete();
        return response()->json(['success'=> true],200);
    }

    /**
     * Napravi izmjenu id-a kategorije (za ažuriranje updated_at od meala), za time_diff parametar
     */
    public function update(string $id)
    {
        $meal = Meal::find($id);
        $meal->category_id = 1;
        $meal->save();
        return response()->json(['success'=> true],200);
    }

    /**
     * Vrati soft deleteani model
     */
    public function restore(string $id)
    {
        Meal::withTrashed()
        ->where('id', $id)
        ->restore();
        return response()->json(['success'=> true],200);
    }
}