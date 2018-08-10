<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<!-- Button for smallest screens -->
				<a class="navbar-brand" href="index.sml">
					<font color="#338899" ><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAS ONLINE</b></font></a>
			</div>
			
			<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.sml">Home</a></li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">PROPOSAL<b class="caret"></b></a>
						
						<ul class="dropdown-menu">
							<li><a href="data_proposal.sml">PROPOSAL DISETUJUI</a></li>
							<li><a href="proposal_pending.sml">PROPOSAL PENDING/ STATUS</a></li>
							<li><a href="proposal_revisi.sml">PROPOSAL REVISI</a></li>
							<li><a href="proposal_tolak.sml">PROPOSAL TOLAK</a></li>
						</ul>
					</li>-->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">PAS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<!--	<li><a href="validasi_pas.sml">Validasi PAS</a></li>
								<li><a href="input_pas_lokal.sml">INPUT PAS</a></li>
								<li><a href="data_validasi_pas_aca.sml">Validasi PAS ACA</a></li>
								<li><a href="data_persetujuan_pas_asm.sml">Persetujuan PAS ASM</a></li>
								<li><a href="data_persetujuan_pas_rpm.sml">Persetujuan PAS RPM</a></li>
								<li><a href="data_persetujuan_pas_rm.sml">Persetujuan PAS RM</a></li>
								<li><a href="data_pengajuan_pas_rma.sml">Pengajuan PAS RMA</a></li>
								<li><a href="validasi_pas.sml">Persetujuan PAS Akhir</a></li>
								<li><a href="data_pas.sml">All PAS &nbsp;</a></li>
							-->
							<!--<li><a href="data_validasi_pas_aca_lokal.sml">VALIDASI PAS LOKAL</a></li>-->
							<li><a href="data_validasi_pas_aca.sml">VALIDASI PAS KDM</a></li>
							<li><a href="pas_valid.sml">PAS DISETUJUI &nbsp;</a></li>
							<li><a href="pas_direvisi.sml">PAS DIREVISI &nbsp;</a></li>
							<li><a href="pas_ditolak.sml">PAS DITOLAK &nbsp;</a></li>
							<li><a href="pas_pending.sml">PAS PENDING/ STATUS &nbsp;</a></li>
							<!--<?php
							$sql4 = mysql_query("SELECT count(id_pas) as kode from tabel_pas where sipas_status='Selesai'");
							$hasil4 = mysql_fetch_array($sql4);
							?>
							<li><a href="pas_selesai.sml">PAS Selesai &nbsp;<font color="red"><b>(<?php echo $hasil4['kode'];?>)</b></font></a></li>-->
						</ul>
					</li>
					
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">PDM<b class="caret"></b></a>
						<?php
						$pdm = mysql_query ("SELECT count(id_pdm) as kode from tabel_pdm where otorisasi_asm<>'Ditolak' and otorisasi_ro<>'Ditolak' and otorisasi_rpm<>'Ditolak' and otorisasi_rca<>'Ditolak'");
						$pdm1 = mysql_query ("SELECT count(id_pdm) as kode from tabel_pdm where otorisasi_asm<>'Disetujui' or otorisasi_ro<>'Disetujui' or otorisasi_rpm<>'Disetujui' or otorisasi_rca<>'Disetujui'");
						$disetujui = mysql_fetch_array($pdm);
						$ditolak = mysql_fetch_array($pdm1);
						?>
						<ul class="dropdown-menu">
							<li><a href="persetujuan_pdm.sml">PERSETUJUAN PDM</a></li>
							<li><a href="pdm_disetujui.sml">PDM DISETUJUI</a></li>
							<li><a href="pdm_ditolak.sml">PDM DITOLAK</a></li>
							<li><a href="pdm_pending.sml">PDM PENDING/ STATUS</a></li>
							<!-- <li><a href="input_pdm.sml">INPUT PDM</a></li> 
							<li><a href="data_pdm.sml">DATA PDM</a></li>
							<li><a href="pdm_disetujui.sml">PDM Disetujui (<font color="red"><?php echo $disetujui['kode'];?></font>)</a></li>
							<li><a href="pdm_ditolak.sml">PDM Ditolak (<font color="red"><?php echo $ditolak['kode'];?></font>)</a></li>
						</ul>
					</li>-->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">TRANSFER<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<!--<li><a href="list_pdm.sml">INPUT TRANSFER PDM</a></li></li>-->
							<li><a href="data_bukti_transfer.sml">LAPORAN PDM</a></li></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">SIPAS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<!--<li><a href="input_sipas.sml">INPUT SIPAS</a></li>-->
						
						<li><a href="data_pengembalian.sml">DATA PENGEMBALIAN SISA PDM &nbsp;</a></li>
						<li><a href="data_sipas.sml">All SIPAS &nbsp;</a></li>
						<li><a href="sipas_kao.sml">SIPAS SIPAS AREA OFFICE KIRIM &nbsp;</a></li>
						<li><a href="sipas_tro.sml">SIPAS REGIONAL OFFICE TERIMA &nbsp;</a></li>
						<li><a href="sipas_kro.sml">SIPAS REGIONAL OFFICE KIRIM SMN/KDM &nbsp;</a></li>
						<li><a href="sipas_ok.sml">SIPAS DISETUJUI SMN/KDM &nbsp;</a></li>
							<!--<li><a href="input_penggantian.sml">INPUT PENGGANTIAN SIPAS </a></li>-->
						<li><a href="sipas_penggantian.sml">PENGGANTIAN SIPAS SML &nbsp;</a></li>
						</ul>
					</li>
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">LAPORAN<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="rekap.sml">LAPORAN</a></li></li>
							<li><a href="rekap2.sml">LAPORAN2</a></li></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dana Marketing<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="input_transaksi.sml">Input Transaksi</a></li>
							<li><a href="input_rekonsiliasi.sml">Input Rekonsiliasi</a></li>
							<li><a href="dana_all.sml">Dana All</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaturan<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="input_user.sml">INPUT USER SISTEM</a></li>
							<li><a href="data_user.sml">DATA USER SISTEM</a></li>
							<li><a href="input_bank.sml">INPUT BANK</a></li>
							<li><a href="data_bank.sml">DATA BANK</a></li>
							<li><a href="data_quartal.sml">Quartal</a></li>
						
							<li><a href="input_ao.sml">INPUT AREA OFFICE</a></li>
							<li><a href="data_ao.sml">DATA AREA OFFICE</a></li>
						
							<li><a href="input_cmr.sml">INPUT CMR</a></li>
							<li><a href="data_cmr.sml">DATA CMR</a></li>
							
							<li><a href="input_budget.sml">INPUT BUDGET</a></li>
							<li><a href="data_budget.sml">DATA BUDGET</a></li>
						</ul>
					</li -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">BUDGET<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="data_budget.sml">MONITORING BUDGET</a></li>
						</ul>
					</li>
					<li><a href="ganti_password.sml">Ganti Password</a></li>
					<li><a href="help.sml">Help</a></li>
					<li><a href="../keluar.php">Keluar</a></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->