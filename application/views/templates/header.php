<!DOCTYPE html>
<html lang="en">
<head>
	<title>Budgetify</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
    <section class="hero">
	  <div class="hero-head">
	    <header class="nav">
	      <div class="container">
	        <div class="nav-left">
	          <a class="nav-item" href="<?php echo base_url(); ?>">
	            <img src="<?php echo base_url(); ?>/assets/img/logo.svg" alt="Logo">
	          </a>
	        </div>
	        <span class="nav-toggle">
	          <span></span>
	          <span></span>
	          <span></span>
	        </span>
	        <div class="nav-right nav-menu">
	          <a class="nav-item" href="<?php echo base_url(); ?>dashboard">
	            Dashboard
	          </a>
						<a class="nav-item" href="<?php echo base_url(); ?>transactions">
	            Transactions
						</a>

						
						<?php if($this->session->userdata('logged_in')) : ?>
							<a class="nav-item" href="<?php echo base_url(); ?>users/logout">
								Logout
							</a>
						<?php endif; ?>
						
						<?php if(!$this->session->userdata('logged_in')) : ?>
							<a class="nav-item" href="<?php echo base_url(); ?>users/register">
								Register
								</a>
							<a class="nav-item" href="<?php echo base_url(); ?>users/login">
								Login
							</a>
						<?php endif; ?>
	        </div>
	      </div>
	    </header>
	  </div>
    </section>
    
    <div class="hero-body budget">
		
	    <div class="container">

				<?php if($this->session->flashdata('user_registered')): ?>
					<div class="notification is-primary">
						<button class="delete"></button>
						<?php echo $this->session->flashdata('user_registered'); ?>
					</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('transaction_created')): ?>
					<div class="notification is-primary">
						<button class="delete"></button>
						<?php echo $this->session->flashdata('transaction_created'); ?>
					</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('post_updated')): ?>
					<div class="notification is-primary">
						<button class="delete"></button>
						<?php echo $this->session->flashdata('post_updated'); ?>
					</div>
				<?php endif; ?>
				
				<?php if($this->session->flashdata('transaction_deleted')): ?>
					<div class="notification is-primary">
						<button class="delete"></button>
						<?php echo $this->session->flashdata('transaction_deleted'); ?>
					</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('user_loggedin')): ?>
					<div class="notification is-success">
						<button class="delete"></button>
						<?php echo $this->session->flashdata('user_loggedin'); ?>
					</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('login_failed')): ?>
					<div class="notification is-danger">
						<button class="delete"></button>
						<?php echo $this->session->flashdata('login_failed'); ?>
					</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('user_logout')): ?>
					<div class="notification is-info">
						<button class="delete"></button>
						<?php echo $this->session->flashdata('user_logout'); ?>
					</div>
				<?php endif; ?>
			