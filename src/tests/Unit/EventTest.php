<?php

namespace Tests\Unit;

use App\Models\Event;
use App\Models\Wedding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if an event can be created using the factory.
     *
     * @return void
     */
    public function test_event_can_be_created_with_factory(): void
    {
        // Create an event instance using the factory without saving to the database
        $event = Event::factory()->make();

        // Assert that the created instance is of type Event
        $this->assertInstanceOf(Event::class, $event);

        // Assert specific attributes
        $this->assertNotEmpty($event->event_name);
        $this->assertNotEmpty($event->event_date);
    }

    /**
     * Test if an event can be persisted to the database.
     *
     * @return void
     */
    public function test_event_can_be_persisted(): void
    {
        // Create and save an event using the factory
        $event = Event::factory()->create();

        // Assert the event exists in the database
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'event_name' => $event->event_name,
        ]);
    }

    /**
     * Test event relationship with wedding.
     *
     * @return void
     */
    public function test_event_belongs_to_wedding(): void
    {
        // Create a wedding
        $wedding = Wedding::factory()->create();
        
        // Create an event associated with the wedding
        $event = Event::factory()->create([
            'wedding_id' => $wedding->id
        ]);
        
        // Assert that the event belongs to the correct wedding
        $this->assertEquals($wedding->id, $event->wedding->id);
        $this->assertInstanceOf(Wedding::class, $event->wedding);
    }

    /**
     * Test event attributes can be set and retrieved.
     *
     * @return void
     */
    public function test_event_attributes(): void
    {
        $eventData = [
            'wedding_id' => Wedding::factory()->create()->id,
            'event_name' => 'Wedding Ceremony',
            'event_date' => now()->addDays(30),
            'event_location' => 'City Garden Hotel',
            'description' => 'Main wedding ceremony',
            'link_embed' => 'https://maps.example.com/location'
        ];
        
        $event = Event::create($eventData);
        
        $this->assertEquals($eventData['event_name'], $event->event_name);
        $this->assertEquals($eventData['event_location'], $event->event_location);
        $this->assertEquals($eventData['description'], $event->description);
        $this->assertEquals($eventData['link_embed'], $event->link_embed);
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $event->event_date);
    }

    /**
     * Test event date is cast to Carbon instance.
     *
     * @return void
     */
    public function test_event_date_is_carbon_instance(): void
    {
        $event = Event::factory()->create();
        
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $event->event_date);
    }
}
