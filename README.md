# Event organizer website

List of content

- [Description](#Description)
- [Components](#Components)
    - [Navbar](#Navbar)
    - [event tile](#event-tile)
    - [google map](#google-map)
    - [calendar](#Calendar)
    
- [Depricated](#Deprecated)

# Description

Project for university course PHP

Created in Laravel/PHP website that can be used to organize events,
buy tickets for this events or only observe them.

**Authors:**
- [Rafał Szczepanik](https://github.com/rafalsz98)
- [Paweł Tomczyk](https://github.com/pawelinformatyk)
- [Krystian Turek](https://github.com/krystian886)
- [Mateusz Sass](https://github.com/Matiisen)



![dashboard](/readme_res/dashboard.png)

![details](/readme_res/details.png)

# Components
Section in which there are documented components along with example usage

## Navbar 
Has two components
<x-navbar.bar> which contains <x-navbar.link> ... :
![x-navbar.bar](readme_res/navbar/bar.png)

### Parameters to bar
- destinations: (**default events.index**) List of routes
- names: (**default suprise**) List of destination names 
- icons: (**default view-list**) List of icons from resources/views/components/icons, icons = svg images
- slot: (**optional**) Navbar name

Values in list are separated by ' ' - one space 

Amount of links in bar depends on count of destinations paramenter eg. if destination='aa bb', then bar has two links.

Value at first position(before first space) corresponds to first value in other parameters...  

### Parameters to link
- destination: (**mandatory**) Route
- icon: (**mandatory**) Icon from resources/views/components/icons
- class: (**optional**) Any css class
- slot: (**mandatory**) link name 

Link on hover changes color from gray to light blue and when user is on linked page it changes color to solid blue.

### Example usage
Bar
```html
    <x-navbar.bar destinations="events.index dashboard" names="Events Dashboard" icons="dashboard calendar">
        {{ __('Calendar') }}
    </x-navbar.bar>
```
Link
```html
    <x-navbar.link destination="events.create"
                   icon="calendar"
                   class="flex items-center px-1 sm:px-2 md:px-3 md:px-4 lg:px-5 text-sm md:text-base lg:text-md xl:text-lg">
        {{ __( 'Create Event' ) }}
    </x-navbar.link>
```

## event-tile
<x-event-tab.side...

![x-event-tab.event-tile](readme_res/event-tab-side/side.png)

### Parameter
- event: (**mandatory**) Event model variable
- ticketBought: (**optional**) adds a ticket img to the tab
	This ticket img lets us download previously bought ticket PDF to our device.
	Values: 0 - ticket not bought
			1 - ticket bought
- switch: (**optional**) if an event already took place - changes the look of the tile.
	Values: 0 - event has not taken place yet
			1 - event has already passed


This element is to be found next to the calendar component and its purpose is to give user more detailed info about given event.

One can find there event's name, time, duration, place and what is perhaps the most important, number of still avaiable tickets.

This element also has an href which directs to the given event detailed view.

### Example usage
```html
<x-event-tab.event-tile :event="$event" :ticketBought="1" :switch="1" />
```

## google-map
<x-google.map...

![x-google.map](readme_res/google-map/map.png)

### Parameter
- function: (**mandatory**) choose map functionality
		1	-	map just marks one place and displays it
		2	-	map lets us create new marker and stores it in database
		3	-	map lets us edit marker placed before
- lat: (**optional**) latitude
- lon: (**optional**) longitude


This element queries the google-api system for geographical data.

It uses generated especially for this project API-key.

To make it work just populate GOOGLE_API_KEY field in your .env file with your one.

### Example usage
```html
<x-google.map :function="1" :lat="50.05" :lon="30"/>
```

## gallery
<x-gallery...

### Parameter
- event: (**mandatory**) Event model variable

For given argument grabs from datebase images related to this argument.
Gallery works like carousel, on click shows next photo.

### Example usage
```html
<x-gallery :event="$event"/>
```

## Calendar
<x-event-tab.calendar ...

### Parameters
- events: (**mandatory**) Array of all events to display

### Example usage
```html
<x-event-tab.calendar :events="$allEvents"/>
```

# Deprecated
**Do not use**

## event-short-tab
There are 2 versions of this component:

<x-event-short-tab.big ... :

![x-event-tab.calendar-tile-big](readme_res/event-short-tab/big.png)

<x-event-short-tab.small ... :

![x-event-tab.calendar-tile-small](readme_res/event-short-tab/small.png)

### Parameters
- event: (**mandatory**) Event model variable
- color: (**default 0**) Used to change color palette, available palettes below
- class: (**optional**) Any css classes

### Available color palettes
- 0
### Adding new colors
In file [tailwind.config.js](tailwind.config.js) in "colors" field you can add new
palettes, according to schema:

    shortTab{ID}: {
        primary: '#RGB',
        secondary: '#RGB'
    },
Then run **npm run dev**
### Example usage
Gives tabs captured on above screens
```html
<x-event-tab.calendar-tile-big :event="$event" class="w-40 my-5" />
<x-event-tab.calendar-tile-small :event="$event" class="w-40 my-5" />
```
