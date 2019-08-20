<?php

namespace Tests\App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShareButtonsControllerTest extends WebTestCase
{
	/**
	 * Checks succesful urls
	 * @dataProvider succesfulUrls
	 */
	public function testPageIsSuccesful($url)
	{
        $client = static::createClient();
        $client->request('GET', $url);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
	}

	//Provides unsuccesful urls
	public function succesfulUrls()
	{
        return array(
			array('/share/facebook/eeeee'),
		);
	}
}
