<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('home'));
});

// Home > $page
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page->title, $page->href);
});

// Home > $page
Breadcrumbs::register('pages', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page, url(str_slug($page)));
});

// Home > $page
Breadcrumbs::register('register', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('routes.register'), url(str_slug(trans('routes.register'))));
});

// Home > $page
Breadcrumbs::register('contact', function($breadcrumbs)
{
   $breadcrumbs->parent('home');
   $breadcrumbs->push(trans('routes.contactUs'), url(str_slug(trans('routes.contactUs'))));
});

// Home > News
Breadcrumbs::register('news', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('routes.news'), url(str_slug(trans('routes.news'))));
});

// Home > News > [Title]
Breadcrumbs::register('news-detail', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('news');
    $breadcrumbs->push($page->title, $page->href);
});

// Home > Events
Breadcrumbs::register('events', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('routes.events'), url(str_slug(trans('routes.events'))));
});

// Home > Events > [Title]
Breadcrumbs::register('events-detail', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('events');
    $breadcrumbs->push($page->title, $page->href);
});

Breadcrumbs::register('seminar', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Seminar', url('seminar'));
});

// Home > Events > [Title]
Breadcrumbs::register('seminar-detail', function($breadcrumbs, $page, $id)
{
    $breadcrumbs->parent('seminar');
    $breadcrumbs->push($page, url('seminar/'.$id));
});
// Home > Events
Breadcrumbs::register('issue', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('routes.issues'), url(str_slug(trans('routes.issues'))));
});

// Home > Events > [Title]
Breadcrumbs::register('issue-detail', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('issue');
    $breadcrumbs->push($page->title, $page->href);
});


