<?php

interface IRoute
{
  static public function getPath(): string;
  public function getContents(): string;
}

abstract class Route implements IRoute
{
}
