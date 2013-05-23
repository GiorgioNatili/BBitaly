<?php

/**
 * Description of CountBbByOwner
 *
 * @author marcello
 */
class Adsolut_Paginator_Adapter_BbByOwner extends Adsolut_Paginator_Adapter_CoreAbstract{
    protected $getendpoint   = "bb-get-byowner";
    protected $countendpoint = "bb-count-byowner";
    protected $paramname     = "ownerid";
}