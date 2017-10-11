<?php
/*
 * This file is part of M4rconverter.
 *
 * (c) Mugenyi henry <mugenyihenry2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace M4rconverter\Format\Audio;

use FFMpeg\Format\Audio\Aac;

class M4rconverterAac extends Aac
{
  protected $params = ['-f', 'mp4'];
  public function __construct(array $options =[])
  {
     $this->generateParams($options);
  }
  /**
  * Add more options to the comandline ffmpeg command
  * @return array
  */
  public function getExtraParams()
  {
    return $this->params;
  }

  public function generateParams(array $options) {
      $setParams = [];
      if(isset($options['duration'])){
         $setParams = ['-af','afade=t=out:st='.($options['duration'] - 1).':d=1','-t',$options['duration']] ;
      }

      $this->params =  array_merge($this->params,$setParams);

  }
}
