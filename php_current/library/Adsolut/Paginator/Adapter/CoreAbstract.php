<?php

/**
 * Description of CoreAdapter
 *
 * @author marcello
 */
abstract class Adsolut_Paginator_Adapter_CoreAbstract implements Zend_Paginator_Adapter_Interface {

    private $core;
    private $param;
    protected $getendpoint;
    protected $countendpoint;
    protected $paramname;

    function __construct(Adsolut_Http_Client $core, $param = null) {
        $this->core = $core;
        $this->param = $param;
    }

    public function count() {
        $response = $this->core->get($this->countendpoint, $this->getParam());
        if (!$response->hasErrors()) {
            return ($response->getData()->count > 0 ? $response->getData()->count : 0);
        }
        return $this->throwError($response);
    }

    public function getItems($offset, $itemCountPerPage) {
        $response = $this->core->get($this->getendpoint, $this->getParam($offset, $itemCountPerPage));
        if (!$response->hasErrors()) {
            return $response->getData();
        }
        return $this->throwError($response);
    }

    private function getParam($offset = null, $itemCountPerPage = null) {
        if ($this->paramname !== null) {
            return array(
                $this->paramname => $this->param,
                'offset' => $offset,
                'limit' => $itemCountPerPage
            );
        } else {
            return array(
                'offset' => $offset,
                'limit' => $itemCountPerPage
            );
        }
    }

    private function throwError($response) {
        $errors = implode(', ', $response->getErrors());
        throw new Exception("Error occurred while fetching data: code(s) [{$errors}]");
    }

}