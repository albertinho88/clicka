<ul id="pm" class="layout-menu clearfix"> 
    <li role="menuitem" >
        <a href="{{ route('application_principal') }}" >
            <i class="fa fa-fw fa-barcode"></i>
            <span >Sistema de Gestión</span>
        </a>                                            
    </li>
    @if ($menu_left_per_user != null)
        <?php  echo $menu_left_per_user; ?>
    @endif 
</ul>
<script type="text/javascript">PrimeFaces.cw("Poseidon", "me", {id: "pm"});</script>

                               


