<?php

namespace Tests;
use PNHS\Validator\Validator;
use PHPUnit\Framework\TestCase;

class Exact extends TestCase
{
    public function testPushAndPop()
    {

      $set = [
        'test1' => rand(1111,9999),
        'test2' => md5(time()),
        'test3' => rand(1,9999),
        'test4' => rand(1111,9999)
      ];

      $validator = new Validator($set);
      $this->assertEquals($set['test1'], $validator->rules('test1', 'Exact:4'));
      $this->assertEquals($set['test2'], $validator->rules('test2', 'Exact:32'));
      $validator->rules('test3', 'Exact:5');
      $validator->rules('test4', 'Exact:5');
      $error = $validator->errors();
      $this->assertEquals($error['test3'], 'test3 must contain exactly 5 characters');
      $this->assertEquals($error['test4'], 'test4 must contain exactly 5 characters');
    }
}