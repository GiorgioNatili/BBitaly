<div class="item accordion-group">
    <div class="detail-block">
        <div class="img">
                <img src="<?php echo $this->getAssetsUrl() ?>img/bb_listing-img-1.jpg" alt="" />
        </div>
        <div class="description">
                <h4><?php echo $data->title ?></h4>
            <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat voluta...</p>
        </div>
        <div class="info">
                <div class="bb-price">
                &euro;<?php echo $data->price ?> / day
            </div>
            <div class="links">
                <a href="#" class="booked">prenota</a>
                <a href="#" class="property"><i class="icon-property"></i> itinerario</a>
            </div>
        </div>
        <div class="detail-trigger">
            <a data-toggle="collapse" data-parent="#detail_accordion" href="#detail_<?php echo $index ?>" class="">&nbsp;CLICIK</a>
        </div>
    </div>
    <div class="collapse" id="detail_<?php echo $index ?>">
    <div class="detail-content">
            <ul class="nav nav-tabs detail-tabs" id="bbTab">
            <li class="active">
                    <a href="#photo_gallery"><i class="icon-photo"></i> Photogallery</a>
            </li>
            <li>
                    <a href="#service_camera"><i class="icon-service"></i> Servizi Camera</a>
            </li>
            <li>
                    <a href="#policy_structure"><i class="icon-policy"></i> Policy Struttura</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane photo-gallery active" id="photo_gallery">
                <div class="photo-main">
                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1-large.jpg" alt="" />
                </div>
                <ul class="photo-list">
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2.jpg" alt="" /></a></li>
                    <li><a href="javascript:void(0);"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" /></a></li>
                </ul>
            </div>
            <div class="tab-pane" id="service_camera">
                    <div class="services-pills" id="services_pills">
                    <div class="tab-pane">
                            <ul class="nav nav-pills">
                            <li class="active">
                                    <a href="#serrvice-pane1" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-1.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane2" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-2.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane3" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-3.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane4" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-4.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane5" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-5.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane6" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-6.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane7" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-7.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane8" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-8.png">
                                </a>
                            </li>
                            <li class="">
                                    <a href="#serrvice-pane9" data-toggle="tab">
                                    <img alt="" src="<?php echo $this->getAssetsUrl() ?>img/bb_service-9.png">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                            <div class="tab-pane active" id="serrvice-pane1">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane2">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane3">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane4">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane5">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane6">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane7">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane8">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="serrvice-pane9">
                            <h4>Struttura</h4>
                            <ul class="structure-item">
                                    <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                                <li>Nome del servizio orem ipsum dolor sit</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                <div class="tab-pane" id="policy_structure">
                        <div class="policy-description">
                        <p>E possibile per il "viaggiatore" annullare la prenotazione effettuata entro 10gg dalla data del check-in.<br>In caso di superamento di tale termine o in caso di no-show la struttura prelevera un importo pari al costo della prima notte.</p>
                        <h5>TARIFFA PREPAGATA NON RIMBORSABILE</h5>
                        <p>offre al viaggiatore la possibilita di pagare in anticipo l'intero soggiorno.<br>In questo caso l'importo cosi pagato non sara rimborsabile al viaggiatore per l'ipotesi di no-show. La struttura dovra offrire al viaggiatore uno sconto sul prezzo pari al 15% del totale importo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>