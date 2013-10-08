<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Core
 *
 * @author marcello
 */
class Adsolut_Resource_Acl extends Zend_Application_Resource_ResourceAbstract {

    private $_instance = null;
    private $roles;
    private $resources;
    private $rules;

    public function getRoles() {
        return $this->roles;
    }

    public function setRoles($roles) {
        $this->roles = $roles;
    }

    public function getResources() {
        return $this->resources;
    }

    public function setResources($resources) {
        $this->resources = $resources;
    }

    public function getRules() {
        return $this->rules;
    }

    public function setRules($rules) {
        $this->rules = $rules;
    }
    
    public function init() {
        if (null === $this->_instance) {
            $acl = new Zend_Acl();
            foreach ($this->roles as $role => $parent) {
                if (!empty($parent)) {
                    if (is_string($parent)) {
                        $acl->addRole(new Zend_Acl_Role($role), $parent);
                    }
                } else {
                    $acl->addRole(new Zend_Acl_Role($role));
                }
            }
            foreach ($this->resources as $resource) {
                $acl->addResource(new Zend_Acl_Resource($resource));
            }
            foreach ($this->rules as $rule) {
                if (preg_match("/\b(?P<verb>allow|deny)\b:(?P<role>[\w]+)@(?P<resource>[\w]+)(\|+(?P<action>[\w]+)$)?/", $rule, $matches)) {
                    if (isset($matches['action'])) {
                        $acl->{$matches['verb']}($matches['role'],$matches['resource'],$matches['action']);
                    } else {
                        $acl->{$matches['verb']}($matches['role'],$matches['resource']);
                    }
                }
            }
            $this->_instance = $acl;
        }
        return $this->_instance;
    }

}