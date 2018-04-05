<?php

namespace MoneyPouch;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as TF;

use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener {
	
	public function onEnable() {
		
		$this->getServer()->getLogger()->notice("MoneyPouch has been enabled!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		
		if(strtolower($command->getName()) === "moneypouch") {
			
			if(count($args) < 2) {
			
				$sender->sendMessage(TF::BOLD . TF::DARK_GRAY . "(" . TF::GOLD . "!" . TF::DARK_GRAY . ") " . TF::RESET . TF::GRAY . "Usage: /moneypouch (player) (tier)");
				return true;
			 
			}
			if($sender->hasPermission("moneypouch.command.give") || $sender->isOp()){
				
				if(isset($args[0])) {
				
					$player = $sender->getServer()->getPlayer($args[0]);
					
					if(isset($args[1])) {
						
						switch($args[1]) {
							
							case 1:
							
							$tier1 = Item::get(Item::ENDER_CHEST, 101, 1);
							$tier1->setCustomName(TF::RESET . TF::BOLD . TF::LIGHT_PURPLE . "Money Pouch" . TF::RESET . TF::GRAY . " (Tap anywhere)" . PHP_EOL . PHP_EOL . 
							TF::DARK_GRAY . " *" . TF::AQUA . " Tier Level: " . TF::GRAY . "1" . PHP_EOL .
							TF::DARK_GRAY . " *" . TF::AQUA . " Amount to win: " . TF::GRAY . "$10,000 - $25,000");
							
							$player->getInventory()->addItem($tier1);
							
							break;
							
							case 2:
							
							$tier2 = Item::get(Item::ENDER_CHEST, 102, 1);
							$tier2->setCustomName(TF::RESET . TF::BOLD . TF::LIGHT_PURPLE . "Money Pouch" . TF::RESET . TF::GRAY . " (Tap anywhere)" . PHP_EOL . PHP_EOL . 
							TF::DARK_GRAY . " *" . TF::AQUA . " Tier Level: " . TF::GRAY . "2" . PHP_EOL .
							TF::DARK_GRAY . " *" . TF::AQUA . " Amount to win: " . TF::GRAY . "$25,000 - $50,000");
							
							$player->getInventory()->addItem($tier2);
							
							break;
							
							case 3:
							
							$tier3 = Item::get(Item::ENDER_CHEST, 103, 1);
							$tier3->setCustomName(TF::RESET . TF::BOLD . TF::LIGHT_PURPLE . "Money Pouch" . TF::RESET . TF::GRAY . " (Tap anywhere)" . PHP_EOL . PHP_EOL . 
							TF::DARK_GRAY . " *" . TF::AQUA . " Tier Level: " . TF::GRAY . "3" . PHP_EOL .
							TF::DARK_GRAY . " *" . TF::AQUA . " Amount to win: " . TF::GRAY . "$50,000 - $100,000");
							
							$player->getInventory()->addItem($tier3);
							
					
