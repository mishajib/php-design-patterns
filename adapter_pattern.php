<?php
#Author - MI SHAJIB

#=============================================
#       PHP OOP - ADAPTER DESIGN PATTERN    #
#=============================================

# Refs - https: //medium.com/@shipu/the-adapter-design-42781fec23fc

interface SocialInterface
{
    public function getFriends();
    public function getPosts();
}

class Facebook implements SocialInterface
{
    public function getFriends()
    {
        var_dump("Get all facebook friends");
    }

    public function getPosts()
    {
        var_dump("Get all facebook posts");
    }
}

class Twitter
{
    public function getFollowers()
    {
        var_dump("Get twitter followers");
    }

    public function getTweets()
    {
        var_dump("Get all twitter tweets");
    }
}

class TwitterAdapter implements SocialInterface
{
    protected $twitter;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function getFriends()
    {
        $this->twitter->getFollowers();
    }

    public function getPosts()
    {
        $this->twitter->getTweets();
    }
}

class LinkedinAdapter implements SocialInterface
{
    protected $linkedin;

    public function __construct(Linkedin $linkedin)
    {
        $this->linkedin = $linkedin;
    }

    public function getFriends()
    {
        $this->linkedin->getConnections();
    }

    public function getPosts()
    {
        $this->linkedin->getFeeds();
    }
}

class Linkedin
{
    public function getConnections()
    {
        var_dump("Get all linkedin connections");
    }

    public function getFeeds()
    {
        var_dump("Get all linkeding feeds");
    }
}

class Person
{
    public function social(SocialInterface $social)
    {
        $social->getFriends();
        $social->getPosts();
    }
}

$person = new Person;
$person->social(new Facebook());
echo PHP_EOL;
$person->social(new TwitterAdapter(new Twitter));
echo PHP_EOL;
$person->social(new LinkedinAdapter(new Linkedin));
