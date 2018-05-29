	<!-- nav -->  
  <?php
ob_start();
date_default_timezone_set('Africa/Abidjan');
?>           

      <nav class="nav-primary hidden-xs">
        <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm"><br/></div>
        <ul class="nav nav-main" data-ride="collapse">
          <li>
            <a href="../agence/dashboard_add.php" class="auto">
              <span class="pull-right text-muted">
                <i class="i i-circle-sm-o text"></i>
                <i class="i i-circle-sm text-active"></i>
              </span>
              <i class="i i-gauge icon">
              </i>
              <span class="font-bold">Accueil</span>
            </a>
          </li>
          <li >
            <a href="#" class="auto">
              <span class="pull-right text-muted">
                <i class="i i-circle-sm-o text"></i>
                <i class="i i-circle-sm text-active"></i>
              </span>
              <i class="i i-stack">
              </i>
              <span class="font-bold">Demarrage</span>
            </a>
            <ul class="nav dk">
              
              <li class="active">
                <ul class="nav dker">
                  <li class="menu_moi">
                    <a href="../operation/initcash.php">                                
                      <span>Debut Journee Cash</span>
                    </a>
                  </li>
                  <li class="menu_moi">
                    <a href="../operation/operate.php">                                
                      <span>Debut Journee UV</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li >
            <a href="#" class="auto">
              <span class="pull-right text-muted">
                <i class="i i-circle-sm-o text"></i>
                <i class="i i-circle-sm text-active"></i>
              </span>
              <i class="i i-stack">
              </i>
              <span class="font-bold">Transactions</span>
            </a>
            <ul class="nav dk">
              
              <li class="active">
                <ul class="nav dker">
                  <li class="menu_moi">
                    <a href="../agence/display.php">                                
                      <span>Liste</span>
                    </a>
                  </li>
                  <li class="menu_moi">
                    <a href="../agence/dashboard_add.php">                                
                      <span>Faire une transaction</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

           <li >
            <a href="#" class="auto">
              <span class="pull-right text-muted">
                <i class="i i-circle-sm-o text"></i>
                <i class="i i-circle-sm text-active"></i>
              </span>
              <i class="i i-stack">
              </i>
              <span class="font-bold">Bilan</span>
            </a>
            <ul class="nav dk">
              
              <li class="active">
                <ul class="nav dker">
                  <li class="menu_moi">
                    <a href="../bilan/journalier.php">                                
                      <span>Journalier</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <li >
            <a href="#" class="auto">
              <span class="pull-right text-muted">
                <i class="i i-circle-sm-o text"></i>
                <i class="i i-circle-sm text-active"></i>
              </span>
              <i class="i i-stack">
              </i>
              <span class="font-bold">Operations</span>
            </a>
            <ul class="nav dk">
              
              <li class="active">
                <ul class="nav dker">
                  <li class="menu_moi">
                    <a href="../operation/apportcash.php">                                
                      <span>Apport Cash</span>
                    </a>
                  </li>
                  <li class="menu_moi">
                    <a href="../operation/apportuv.php">                                
                      <span>Apport UV</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
      </ul>
      </nav>
      <!-- / nav -->
<?php
 ob_end_flush();
?>