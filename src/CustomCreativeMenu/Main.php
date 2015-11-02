<?php

namespace CustomCreativeMenu;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  public function onEnable(){
	$this->getserver()->getPluginManager()->registerEvents($this, $this);
	if(!is_dir($this->getDataFolder())){
		@mkdir($this->getDataFolder());
	}
	if(!file_exists($this->getDataFolder()."config.yml")){
		$this->customCreativeMenu = (new Config($this->getDataFolder()."config.yml", Config::YAML, array(
		  "added" => [
			 246 => 0, #Glowing Obsidian
			 255 => 0, #Grey "Glitch Stone"
		  ],
		  "removed" => [
			 46 => 0, #TNT
			 7 => 0, #Bedrock
		  ],
		  "Reactors" => true,
		  "ReactorMeta" => [
		  1,
		  2,
		  ],
		  "#False to remove all eggs",
		  "Eggs" => true,
		  "EggMeta" => [
			  10,
			  11,
			  12,
			  13,
			  14,
			  15,
			  16,
			  17,
			#  18,
			#  19,
			#  20,
			#  21,
			#  23,
			#  24,
			#  25,
			#  26,
			#  27,
			#  28,
			#  29,
			#  30,
			#  31,
			  32,
			  33,
			  34,
			  35,
			  36,
			  37,
			  38,
			  39,
			  40,
			  41,
			  42,
		  ],
		)));
	}
	if($this->customCreativeMenu->get("Eggs") === false){
		foreach($this->customCreativeMenu->get("EggMeta") as $damagevalue){
		Item::removeCreativeItem(Item::get(383, $damagevalue)); 
		}		
	}else{
		foreach($this->customCreativeMenu->get("EggMeta") as $damagevalue){
		Item::addCreativeItem(Item::get(383, $damagevalue)); 
		}	
	}
	if($this->customCreativeMenu->get("Reactors") === false){
		foreach($this->customCreativeMenu->get("ReactorMeta") as $damagevalue){
		Item::removeCreativeItem(Item::get(247, $damagevalue));  
		}
	}else{
		foreach($this->customCreativeMenu->get("ReactorMeta") as $damagevalue){
		Item::addCreativeItem(Item::get(247, $damagevalue));  
		}
	}
	
    foreach($this->customCreativeMenu->get("added") as $aitem => $damagevalue){
      Item::addCreativeItem(Item::get($aitem, $damagevalue));
	  $this->getLogger()->info($aitem . ":" . $damagevalue);
	  $this->getLogger()->info(Item::get($aitem, $damagevalue));
    }
    foreach($this->customCreativeMenu->get("removed") as $ritem => $damagevalue){
      Item::removeCreativeItem(Item::get($ritem, $damagevalue));   
    }
    $this->getLogger()->info("§aCustomCreativeMenu loaded.");
  }
}
