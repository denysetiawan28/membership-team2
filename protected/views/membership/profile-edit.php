<?php $this->layout('layouts::layout-system'); ?>

<?php
$this->append_js(array(
	$this->uri_base_url().'/public/js/jquery.inputmask.bundle.js',
    $this->uri_base_url().'/public/js/app/membership/profile-edit.js'
));
?>

<section id="primary" class="content-full-width">

	<div class="full-width-section">

		<div class="container" style="margin-top: -70px;">

			<h3 style="border-bottom: 1px #000000 solid;">Update My Basic Profile</h3>

			<?php
			echo $this->insert('sections::flash-message');
			?>

			<form action="<?php echo $this->uri_path_for('membership-profile-edit'); ?>" method="post" enctype="multipart/form-data" class="checkout" novalidate>


				<div class="row">
					<div class="col-xs-10 col-sm-5 col-md-5 "><!-- left-col-oprek -->
						<div class="form-group">
							<label for="fullname" style="font-weight: bold;">Nama Lengkap *</label>
							<input type="text" class="input_full" id="fullname" name="fullname" value="<?php echo $this->fh_default_val('fullname', $member['fullname']); ?>" />
							<p class="help-block">
							<?php echo $this->fh_show_errors('fullname', $_view_validation_errors_); ?>
							</p>
						</div>

						<div class="form-group">
							<label for="email" style="font-weight: bold;">Email *</label>
							<input type="text" class="input_full" id="email" name="email" value="<?php echo $this->fh_default_val('email', $_SESSION['MembershipAuth']['email']); ?>" />
							<p class="help-block">
							<?php echo $this->fh_show_errors('email', $_view_validation_errors_); ?>
							</p>
						</div>

						<div class="form-group">
							<label for="contact_phone" style="font-weight: bold;">Telepon</label>
							<input type="text" class="input_full" id="contact_phone" name="contact_phone" value="<?php echo $this->fh_default_val('contact_phone', $member['contact_phone']); ?>" />
						</div>

						<div class="form-group">
							<label for="province_id" style="font-weight: bold;">Provinsi *</label>
							<?php
							echo $this->fh_input_select('province_id', $provinces, array(
								'default' => $member['province_id'],
								'id' => 'provinces-dd',
								'class' => 'input_full'
							));
							?>
							<p class="help-block">
							<?php echo $this->fh_show_errors('province_id', $_view_validation_errors_); ?>
							</p>
						</div>
						
						<div class="form-group">
							<label for="city_id" style="font-weight: bold;">Kabupaten / Kota Domisili *</label>
							<?php
							echo $this->fh_input_select('city_id', $cities, array(
								'default' => $member['city_id'],
								'id' => 'cities-dd',
								'class' => 'input_full'
							));
							?>
							<p class="help-block">
							<?php echo $this->fh_show_errors('city_id', $_view_validation_errors_); ?>
							</p>
						</div>
						
						<div class="form-group">
							<label for="area" style="font-weight: bold;">Area *</label>
							<input type="text" class="input_full" id="area" name="area" value="<?php echo $this->fh_default_val('area', $member['area']); ?>" />
						</div>

						<div class="form-group">
							<label for="job-id" style="font-weight: bold;">Pekerjaan *</label>
							<?php
							echo $this->fh_input_select('job_id', $jobs, array(
								'default' => $member['job_id'],
								'id' => 'job-id',
								'class' => 'input_full'
							));
							?>
							<p class="help-block">
							<?php echo $this->fh_show_errors('job_id', $_view_validation_errors_); ?>
							</p>
						</div>
						
						<div class="form-group">
							<label for="identity_type" style="font-weight: bold;">Jenis Identitas</label>
							<?php
							echo $this->fh_input_select('identity_type', $identity_types, array(
								'default' => $member['identity_type'],
								'id' => 'identity_type',
								'class' => 'input_full'
							));
							?>
						</div>
						<div class="form-group">
							<label for="identity_number" style="font-weight: bold;">Nomer Identitas</label>
							<input type="text" class="input_full" id="identity_number" name="identity_number" value="<?php echo $this->fh_default_val('identity_number', $member['identity_number']); ?>" />
						</div>

						<div class="form-group">
							<label for="birth_place" style="font-weight: bold;">Tempat Lahir</label>
							<input type="text" class="input_full" id="birth_place" name="birth_place" value="<?php echo $this->fh_default_val('birth_place', $member['birth_place']); ?>" />
						</div>

						<div class="form-group">
							<label for="birth-date" style="font-weight: bold;">Tanggal Lahir</label>
							<input type="text" class="input_full" id="birth-date" name="birth_date" value="<?php echo $member['birth_date']; ?>" />
						</div>

						<div class="form-group">
							<label for="religion_id" style="font-weight: bold;">Religi</label>
							<?php
							echo $this->fh_input_select('religion_id', $religions, array(
								'default' => $member['religion_id'],
								'id' => 'religion-dd',
								'class' => 'input_full'
							));
							?>
						</div>
					</div>
				<!-- </div>

				<div class="row"> -->
					<div class="col-xs-10 col-sm-5 col-md-5 "><!-- right-col-oprek -->
					<fieldset>
						<legend>Photo Profile</legend>
						<div class="dt-sc-team">
							<div class="image">
								<img id="img-photo-profile" src="<?php echo $this->uri_user_photo($member['photo'], ['width' => '180', 'height' => '180']) ?>" alt="user avatar" style="width: 180px; height: 180px;" />
							</div>

							<div style="clear: both;">
								<p>Update Photo Profile</p>
								<input type="file" name="photo" id="photo-profile" />
							</div>

						</div>
					</fieldset>

					<fieldset>
						<legend>Social Medias</legend>

						<table class="table">
							<thead>
								<tr>
									<th>Media Name</th>
									<th>Account Name</th>
									<th>Account Url</th>
									<th>&nbsp;</th>
								</tr>
							</thead>

							<tbody id="socmed-rows">
								<?php
								if ($members_socmeds):
									$ii = 0;
									foreach ($members_socmeds as $socmed):
								?>

								    <tr id="socmed-item<?php echo $ii; ?>">
								    	<td>
								    		<?php echo $socmedias[$socmed['socmed_type']]; ?>
								    		<input class="db-row-id" type="hidden" name="socmeds[<?php echo $ii; ?>][member_socmed_id]" value="<?php echo $socmed['member_socmed_id']; ?>" />
								    		<input class="socmed-type" type="hidden" name="socmeds[<?php echo $ii; ?>][socmed_type]" value="<?php echo $socmed['socmed_type']; ?>" />
								    	</td>

								    	<td>
								    		<input type="text" name="socmeds[<?php echo $ii; ?>][account_name]" value="<?php echo $socmed['account_name']; ?>" placeholder="BUKAN FULLNAME. Contoh: @phpindonesia - for twitter, princessyahrini for instagram" />
								    	</td>

								    	<td>
								    		<input type="text" name="socmeds[<?php echo $ii; ?>][account_url]" value="<?php echo $socmed['account_url']; ?>" placeholder="Contoh: https://www.facebook.com/profile.php?id=12345678 - Jika sosmed tidak memiliki fitur nickname seperti twitter." />
								    	</td>

								    	<td style="font-size: 1.5em">
								    		<a href="javascript:delete_socmed('socmed-item<?php echo $ii; ?>')" title="Delete this socmed item">x</a>
								    	</td>

								    </tr>

								<?php
								    $ii++;
								    endforeach;
								else:											   
								?>

								<tr class="empty-row">
									<td>---</td>
									<td>---</td>
									<td>---</td>
									<td>---</td>
								</tr>

								<?php
								endif;
								?>
							</tbody>
						</table>

						<fieldset>
							<legend>Tambah Informasi Social Media</legend>

							<div class="form-group">
								<label for="identity_type" style="font-weight: bold;">Jenis Social Media</label>
								<?php
								echo $this->fh_input_select('socmed_type', $socmedias, array(
									'id' => 'meds-dd',
									'class' => 'input_full'
								));
								?>
							</div>
							<div class="form-group">
								<label for="socmed-account-name" style="font-weight: bold;">Account Name</label>
								<input type="text" class="input_full" id="socmed-account-name" />
								<p style="color: #EA7120; font-size: 0.8em;">BUKAN FULLNAME.</p>
							</div>

							<div class="form-group">
								<label for="socmed-account-url" style="font-weight: bold;">Account Url</label>
								<input type="text" class="input_full" id="socmed-account-url" />
							</div>

								</tbody>
							</table>

							<button id="add-socmed" type="button" class="button">Add new</button>

							<div id="delete-collections"></div>


						</fieldset>

					</fieldset>

					</div>
				</div>


				<div style="clear: both; margin-bottom: 25px; background-color:#478BCA; padding: 10px;">
					<input value="Update Data" type="submit">
					<button type="button" onclick="location.href='/apps/membership/profile';">Cancel and Back</button>
				</div>

			</form>

		</div>

	</div>

</section>

