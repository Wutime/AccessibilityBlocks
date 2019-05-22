<?php

namespace Wutime\AccessibilityBlocks;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Db\Schema\Alter;


class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;

	public function installStep1()
	{

		$this->schemaManager()->alterTable('xf_user_option', function(Alter $table)
		{
			$table->addColumn('wutime_accblock', 'tinyint')->setDefault(0)->after('user_id');
		});
	}


	public function uninstallStep1()
	{
		$this->schemaManager()->alterTable('xf_user_option', function(Alter $table)
		{
			$table->dropColumns(['wutime_accblock']); 
		});
	}

}
