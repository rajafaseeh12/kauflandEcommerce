<?php

namespace Tests\Feature;

use App\Models\FeedItems;
use App\Services\FeedService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FeedServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreImportedFeedsToDB() 
    {
        // Mock feed data for testing
        $feedData = simplexml_load_string('<root><item><entity_id>1</entity_id><CategoryName>Test</CategoryName></item></root>');

        
        $result = FeedService::storeImportedFeedsToDB($feedData);

        
        $this->assertEquals('Data successfully imported ', $result['logMessage']);

        
        $this->assertDatabaseCount('feeditems', 1);

 
        $this->assertDatabaseHas('feeditems', [
            'entity_id' => 1,
            'categoryName' => 'Test',
        ]);
    }
}
