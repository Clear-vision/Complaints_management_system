<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled">

	  <li>
                      <a href="dashboard.php">
                          <i class="menu-icon icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Manage Complaint
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="notprocess-complaint.php">
											<i class="icon-tasks"></i>
											Not Process Yet Complaint
											<?php
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null");
$num1 = mysqli_num_rows($rt);
{?>
		
											<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="inprocess-complaint.php">
											<i class="icon-tasks"></i>
											Pending Complaint
                   <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="closed-complaint.php">
											<i class="icon-inbox"></i>
											Closed Complaints
	     <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Manage student
								</a>
							</li>

							<li>
								<a href="manage_staff.php">
									<i class="menu-icon icon-group"></i>
									Manage staff
								</a>
							</li>
						

						<li>
								<a href="faculty.php">
									<i class="menu-icon icon-tasks"></i>
									Manage faculty
								</a>
							</li>

							<li>
								<a href="program.php">
									<i class="menu-icon icon-tasks"></i>
									Manage program
								</a>
							</li>

							<li>
								<a href="department.php">
									<i class="menu-icon icon-tasks"></i>
									Manage department
								</a>
							</li>
						</ul>


						</ul>


                        
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li><a href="user-logs.php"><i class="menu-icon icon-user"></i>User Login Log </a></li>
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
