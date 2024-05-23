<?php

class infos_comptes_rendus{
    use Model;
    protected $table = "infos_comptes_rendus";
    protected $allowedColumns = ['Prof', 'Module', 'date_f', 'time_f'];
}