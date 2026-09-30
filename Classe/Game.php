<?php

abstract class Game
{
  protected string $title;
  protected string $release_date;
  protected string $description;
  protected int $max_local_players;
  protected int $developer_id;
  protected int $genre_id;

  public function __construct(
    string $title,
    string $release_date,
    string $description,
    int $max_local_players,
    int $developer_id,
    int $genre_id
  ) {
    $this->title = $title;
    $this->release_date = $release_date;
    $this->description = $description;
    $this->max_local_players = $max_local_players;
    $this->developer_id = $developer_id;
    $this->genre_id = $genre_id;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getReleaseDate()
  {
    return $this->release_date;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getMaxLocalPlayers()
  {
    return $this->max_local_players;
  }

  public function getDeveloperId()
  {
    return $this->developer_id;
  }

  public function getGenreId()
  {
    return $this->genre_id;
  }

  abstract public function getCopyType();
}