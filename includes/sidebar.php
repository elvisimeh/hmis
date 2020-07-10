<div class="pcoded-inner-navbar main-menu">
                            
                            <div data-i18n="nav.category.navigation"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main"><?= $obj->selects('role_tbl','WHERE id ='.$role)[0]['rolename'];?></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <?php foreach($menus as $menu){ ?>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"><?= $menu['menu_name'] ?></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <?php foreach($rights as $user_right){ 
                                            if($user_right['menu_id'] == $menu['id']){ ?> 
                                        <li class=" ">
                                            <a href="javascript:void(0)" onclick = "<?= $user_right['function_name'].'()' ?>" >
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><?= $user_right['submenu_name'] ?></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                            <?php }} ?>
                                    </ul>
                                </li>
                                            
                                <hr>
                                <?php } ?>
					
					           
					           </div>