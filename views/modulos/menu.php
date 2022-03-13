
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="views/assets/dist/img/logoBomb.jpeg" alt="Bomberos Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BOMBEROS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="views/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['nombres']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php 
                $menuspermisos = ControladorPerfiles::getMenusPerfilesOdenado($_SESSION['perfil']);

                foreach($menuspermisos as $item){
                    $menus = ControladorPerfiles::getData('sys_menus','menus_id_i', $item['pem_men_id_i']);
                    if($menus['menus_reporte_i'] == 0){
                        if($menus['menus_es_treview'] == 1){
                            echo '
                                <li class="nav-item menu-open" id="'.$menus['menus_id_v'].'">
                                    <a class="nav-link">
                                        <i class="'.$menus['menus_html_icon_v'].'"></i> 
                                        <p>'.mb_strtoupper($menus['menus_nombre_v']).' <span class="fa fa-chevron-down"></span>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">';
                                    
                                    $submenus = ControladorPerfiles::ctrMostrar('sys_submenu', 'submenu_menu_id', $menus['menus_id_i']);
                                    foreach ($submenus as $key) {
                                        echo '
                                        <li class="nav-item" id="'.$key['submenu_id_v'].'">
                                            <a href="'.$key['submenu_href'].'"  class="far fa-circle nav-icon"> 
                                                '.$key['submenu_nombre'].'
                                            </a>
                                        </li>';
                                    }
                            echo '  </ul>
                                </li>';
                        }else{
                            echo '<li class="nav-item" id="'.$menus['menus_id_v'].'">
                                <a href="'.$menus['menus_html_href_v'].'" class="nav-link">
                                    <i class="'.$menus['menus_html_icon_v'].'"></i> 
                                    <p>
                                    '.mb_strtoupper($menus['menus_nombre_v']).'
                                    </p> 
                                </a>
                            </li>';
                        }   
                    }
                } 

                echo '<li class="nav-item" id="'.$menus['menus_id_v'].'">
                            <a href="salir" class="nav-link">
                                <i class="fa fa-power-off"></i> 
                                <p>
                                    SALIR
                                </p> 
                            </a>
                        </li>';
            ?>
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>