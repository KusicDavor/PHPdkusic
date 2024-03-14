<?php
interface RequestInterface {
    public function getParam($params);
    public function getQueryParams();
}
