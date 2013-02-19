<?

namespace BladeTester\ChainedStubsBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;


/**
 * @todo : rename bundle
 */
class TableTruncator {

	public static function truncate(array $tables, ObjectManager $om) {
        $connection = $om->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->query("SET foreign_key_checks = 0");
        foreach ($tables as $table) {
            $connection->executeUpdate($platform->getTruncateTableSQL($table));
        }
        $connection->query("SET foreign_key_checks = 1");
	}
}