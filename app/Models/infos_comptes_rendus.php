<?php

class infos_comptes_rendus{
    use Model;
    protected $table = "Infos_comptes_rendus";
    protected $allowedColumns = ['Prof', 'Module', 'time_d', 'date_f', 'time_f'];
}
