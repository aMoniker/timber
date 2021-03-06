<?php

	class TimberDatesTest extends WP_UnitTestCase {

		function testDate(){
			$pid = $this->factory->post->create();
			$post = new TimberPost($pid);
			$twig = 'I am from {{post.date}}';
			$str = Timber::compile_string($twig, array('post' => $post));
			$this->assertEquals('I am from '.date('F j, Y'), $str);
		}

		function testPostDate(){
			$pid = $this->factory->post->create();
			$post = new TimberPost($pid);
			$twig = 'I am from {{post.post_date}}';
			$str = Timber::compile_string($twig, array('post' => $post));
			$this->assertEquals('I am from '.$post->post_date, $str);
		}

		function testPostDateWithFilter(){
			$pid = $this->factory->post->create();
			$post = new TimberPost($pid);
			$twig = 'I am from {{post.post_date|date}}';
			$str = Timber::compile_string($twig, array('post' => $post));
			$this->assertEquals('I am from '.date('F j, Y'), $str);
		}

		function testModifiedDate(){
			$pid = $this->factory->post->create();
			$post = new TimberPost($pid);
			$twig = "I was modified {{post.modified_date('F j, Y @ g:i a')}}";
			$str = Timber::compile_string($twig, array('post' => $post));
			$this->assertEquals('I was modified '.date('F j, Y @ g:i a'), $str);

		}

	}