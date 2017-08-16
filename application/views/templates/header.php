<!DOCTYPE html>
<html lang="en">
<head>
	<title>Budgetify</title>
	<meta name="viewport" content="width=device-width">
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
    <section class="hero">
	  <div class="hero-head">
	    <header class="nav">
	      <div class="container">
	        <div class="nav-left">
	          <a class="nav-item" href="<?php echo base_url(); ?>">
	            <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="Logo">
	          </a>
	        </div>
	        <span class="nav-toggle">
	          <span></span>
	          <span></span>
	          <span></span>
	        </span>
	        <div class="nav-right nav-menu">
	          <a class="nav-item is-active" href="<?php echo base_url(); ?>transactions">
	            Dashboard
	          </a>
	          <a class="nav-item">
	            Report
	          </a>
	          <a class="nav-item">
	            Account
              </a>
              <a class="nav-item" href="<?php echo base_url(); ?>about">
	            About
	          </a>
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
			