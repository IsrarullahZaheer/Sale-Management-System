<?php

if (isset($_POST['convert'])) {
    $af2rs = $_POST['af2rs'];

    $query = "SELECT * FROM sarafi ORDER BY id DESC LIMIT 1";
    $selectLast = mysqli_query($connection, $query);
    if ($selectLast) {
        while ($rows = mysqli_fetch_assoc($selectLast)) {
            $lastAf2rs = $rows['af2rs'];
        }
    }

    if ($af2rs == "" || empty($af2rs)) {
        echo "SORRY!!! The Field Is Empty";
    } elseif ($af2rs == $lastAf2rs) {
        echo "SORRY!!! This Record is already Exists";
    } else {

        $query = "INSERT INTO sarafi (af2rs) VALUES ('{$af2rs}')";
        $insertAf2rs = mysqli_query($connection, $query);

    }

}
?>
<nav
				class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom"
			>
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<!-- Search form -->
						<form action="" method="POST"
							class="navbar-search navbar-search-light form-inline mr-sm-3"
							id="navbar-search-main"
						>
							<div class="form-group mb-0">
								<div
									class="input-group input-group-alternative input-group-merge"
								>
									<div class="input-group-prepend">
										<span class="input-group-text"
											><i class="fas fa-exchange-alt"></i
										></span>
									</div>
									<input
										class="form-control"
										placeholder="  د 1000 افغانیو څو کلداری کیږی "
										type="number"
										id="custom-search"
										name="af2rs"
									/>
									<div class="input-group-prepend">
										<span class="input-group-text">
											<button type="submit" name="convert" class="btn btn-success btn-sm" >
												<i class="fas fa-plus-circle"></i>
											</button>
										</span>
									</div>
								</div>
							</div>
							<button
								type="button"
								class="close"
								data-action="search-close"
								data-target="#navbar-search-main"
								aria-label="Close"
							>
								<span aria-hidden="true">×</span>
							</button>
						</form>


						<!-- Navbar links -->
						<ul class="navbar-nav align-items-center ml-md-auto">
							<li class="nav-item d-xl-none">
								<!-- Sidenav toggler -->
								<div
									class="pr-3 sidenav-toggler sidenav-toggler-dark"
									data-action="sidenav-pin"
									data-target="#sidenav-main"
								>
									<div class="sidenav-toggler-inner">
										<i class="sidenav-toggler-line"></i>
										<i class="sidenav-toggler-line"></i>
										<i class="sidenav-toggler-line"></i>
									</div>
								</div>
							</li>
							<li class="nav-item d-sm-none">
								<a
									class="nav-link"
									href="#"
									data-action="search-show"
									data-target="#navbar-search-main"
								>
									<i class="ni ni-zoom-split-in"></i>
								</a>
							</li>


						</ul>

						<ul class="navbar-nav align-items-center ml-auto ml-md-0">
							<li class="nav-item dropdown">
								<a
									class="nav-link pr-0"
									href="#"
									role="button"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
								>
									<div class="media align-items-center">
										<span class="avatar avatar-sm rounded-circle">
											<img
												alt="Image placeholder"
												src="img/theme/israr.jpg"
											/>
										</span>
										<div class="media-body ml-2 d-none d-lg-block">
											<span class="mb-0 text-sm font-weight-bold"
												><?=$_SESSION['username'];?></span
											>
										</div>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="dropdown-header noti-title">
										<h6 class="text-overflow m-0">Welcome!</h6>
									</div>
									<a href="#!" class="dropdown-item">
										<i class="ni ni-single-02"></i>
										<span>My profile</span>
									</a>
									<!-- <a href="#!" class="dropdown-item">
										<i class="ni ni-settings-gear-65"></i>
										<span>Settings</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="ni ni-calendar-grid-58"></i>
										<span>Activity</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="ni ni-support-16"></i>
										<span>Support</span>
									</a> -->
									<div class="dropdown-divider"></div>
									<a href="logout.php" class="dropdown-item">
										<i class="ni ni-user-run"></i>
										<span>Logout</span>
									</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
