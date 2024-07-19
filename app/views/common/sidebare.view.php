<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-bar">
        <div class="nk-apps-brand">
            <a href="html/index.html" class="logo-link">
                <img class="logo-light logo-img" src="<?=ROOT?>/images/logo-small.png" srcset="<?=ROOT?>/images/logo-small2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="<?=ROOT?>/images/logo-dark-small.png" srcset="<?=ROOT?>/images/logo-dark-small2x.png 2x" alt="logo-dark">
            </a>
        </div>
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-body">
                <div class="nk-sidebar-content" data-simplebar>
                    <div class="nk-sidebar-menu">
                        <!-- Menu -->
                        <ul class="nk-menu apps-menu">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navPharmacy">
                                    <span class="nk-menu-icon"><em class="icon ni ni-capsule"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navHospital">
                                    <span class="nk-menu-icon"><em class="icon ni ni-plus-medi"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navPages">
                                    <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content " data-content="navPharmacy">
                <h5 class="title">Pharmacy</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Tableau de bord</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Fournisseurs</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Fournisseurs" class="nk-menu-link"><span class="nk-menu-text">Ajouter </span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Fournisseurs/liste" class="nk-menu-link"><span class="nk-menu-text">Liste des fournseurs</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-capsule-fill"></em></span>
                            <span class="nk-menu-text">Unités</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Unites/" class="nk-menu-link"><span class="nk-menu-text">Ajouter unité </span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Unites/liste" class="nk-menu-link"><span class="nk-menu-text">Liste des unités</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-capsule-fill"></em></span>
                            <span class="nk-menu-text">Famille</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Familles/" class="nk-menu-link"><span class="nk-menu-text">Ajouter </span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Familles/liste" class="nk-menu-link"><span class="nk-menu-text">Liste des familles</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-capsule-fill"></em></span>
                            <span class="nk-menu-text">Medicaments</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Medicaments/" class="nk-menu-link"><span class="nk-menu-text">Ajouter medicaments</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Medicaments/liste" class="nk-menu-link"><span class="nk-menu-text">Liste medicament</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text">Commande Medicament</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Commandes" class="nk-menu-link"><span class="nk-menu-text">Nouvelle CMD</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Commandes/Liste" class="nk-menu-link"><span class="nk-menu-text">Liste de Commandes</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                            <span class="nk-menu-text">Reception</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Receptions" class="nk-menu-link"><span class="nk-menu-text">Receptionner CMD</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pharmacy/wastage-return.html" class="nk-menu-link"><span class="nk-menu-text">Liste des Receptions</span></a>
                            </li>

                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-coin-alt-fill"></em></span>
                            <span class="nk-menu-text">Paiement Commande</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/pharmacy/income-list.html" class="nk-menu-link"><span class="nk-menu-text">Paiement Commande</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pharmacy/expense-list.html" class="nk-menu-link"><span class="nk-menu-text">Paiement effectués</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-coin-alt-fill"></em></span>
                            <span class="nk-menu-text">Paiement ordonnance</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Payement_ord" class="nk-menu-link"><span class="nk-menu-text">Paiement ordo</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Payement_ord/ordonnance_payer" class="nk-menu-link"><span class="nk-menu-text">Ordonnance effectuer</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-activity-round-fill"></em></span>
                            <span class="nk-menu-text">Report</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/pharmacy/sales-report.html" class="nk-menu-link"><span class="nk-menu-text">Sales Report</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pharmacy/purchase-report.html" class="nk-menu-link"><span class="nk-menu-text">Purchase Report</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pharmacy/stock-report.html" class="nk-menu-link"><span class="nk-menu-text">Stock Report</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content menu-active" data-content="navHospital">
                <h5 class="title">Gestion du cabinet</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="<?=ROOT?>/Home" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Teableau de bord</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="<?=ROOT?>/Tickets/liste" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-note-add-fill"></em></span>
                            <span class="nk-menu-text">Liste d'attente</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-medi-fill"></em></span>
                            <span class="nk-menu-text">Medecins</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Utilisateurs" class="nk-menu-link"><span class="nk-menu-text">Ajouter</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Utilisateurs/liste" class="nk-menu-link"><span class="nk-menu-text">Liste de docteurs</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Consultation</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Consultations" class="nk-menu-link"><span class="nk-menu-text">Consultation patient</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Consultations/liste" class="nk-menu-link"><span class="nk-menu-text">Consultation effectuer</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Consultations/liste_rdv" class="nk-menu-link"><span class="nk-menu-text">Consultation par RDV </span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-coin-alt-fill"></em></span>
                            <span class="nk-menu-text">Rendez-vous</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Rendez_vous" class="nk-menu-link">
                                    <span class="nk-menu-text">Liste rendez-vous</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Rendez_vous/rendezvous_effectue" class="nk-menu-link">
                                    <span class="nk-menu-text">Les rendez-vous realisés</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-table-view-fill"></em></span>
                            <span class="nk-menu-text">Ordonnance</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Ordonnances/liste" class="nk-menu-link"><span class="nk-menu-text">Liste des ordonnance</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-activity-round-fill"></em></span>
                            <span class="nk-menu-text">Analyse Médicale</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Analyses" class="nk-menu-link"><span class="nk-menu-text">Analyse par Ticket</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Analyses/Liste" class="nk-menu-link"><span class="nk-menu-text">Analyse par Consultation</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="<?=ROOT?>/Analyses/analyse_realise" class="nk-menu-link"><span class="nk-menu-text">Analyse realisée</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-panel-fill"></em></span>
                            <span class="nk-menu-text">Les services </span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/hospital/bed-group.html" class="nk-menu-link"><span class="nk-menu-text">Lits</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/hospital/bed-allotment.html" class="nk-menu-link"><span class="nk-menu-text">Bed Allotment</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/hospital/department.html" class="nk-menu-link"><span class="nk-menu-text">Department</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/hospital/death-report.html" class="nk-menu-link"><span class="nk-menu-text">Death Report</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/hospital/user-profile.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                            <span class="nk-menu-text">User Profile</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/hospital/settings.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
                            <span class="nk-menu-text">Setting</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navPages">
                <h5 class="title">Pages</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                            <span class="nk-menu-text">Departement</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/project-card.html" class="nk-menu-link"><span class="nk-menu-text">Ajouter</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Liste des departements</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Salles</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">Ajouter salle</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text">Liste des salles</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-behance-fill"></em></span>
                            <span class="nk-menu-text">Lits</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/products.html" class="nk-menu-link"><span class="nk-menu-text">Ajouter lit</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/orders-regular.html" class="nk-menu-link"><span class="nk-menu-text">Liste lit</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div>
        </div>
    </div>
</div>