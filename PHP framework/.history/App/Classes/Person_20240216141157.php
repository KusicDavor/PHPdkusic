
class Person {
    public string $ime;
    public string $spol;
    public int $dob;

    public function __construct(string $ime, string $spol, int $dob) {
        $this->ime = $ime;
        $this->spol = $spol;
        $this->dob = $dob;
    }
}
