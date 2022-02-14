
         <div class="page-wrapper">          
            <nav class="navbar">
               <a href="#" class="sidebar-toggler"><i data-feather="menu"></i></a>
               <div class="navbar-content">
                  <ul class="navbar-nav">
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span></a>
                     </li>

                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="wd-30 ht-30 rounded-circle" src="https://ui-avatars.com/api/?name=<?=$Auth['name']?>&color=7F9CF5&background=EBF4FF" alt="<?=$Auth['name']?>">
                        </a>

                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                           <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                              <div class="mb-3">
								  <img class="wd-30 ht-30 rounded-circle" src="https://ui-avatars.com/api/?name=<?=$Auth['name']?>&color=7F9CF5&background=EBF4FF" alt="<?=$Auth['name']?>">
                              </div>
                              <div class="text-center">
                                 <p class="tx-16 fw-bolder"><?=$Auth['name']?></p>
                                 <p class="tx-12 text-muted"><?=$Auth['email']?></p>
                              </div>
                           </div>
                           <ul class="list-unstyled p-1">
                              <li class="dropdown-item py-2">
                                 <a href="<?=base_url('admin/logout')?>" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
