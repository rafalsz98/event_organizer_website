# Event planner website

List of content

- [Description](#Description)
- [Components](#Components)

# Description
todo description

# Components
Section in which there are documented components along with example usage
## event-short-tab
There are 2 versions of this component:

<x-event-short-tab.big ... :

![x-event-short-tab.big](readme_res/event-short-tab/big.png)

<x-event-short-tab.small ... :

![x-event-short-tab.small](readme_res/event-short-tab/small.png)

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
<x-event-short-tab.big :event="$event" class="w-40 my-5"></x-event-short-tab.big>
<x-event-short-tab.small :event="$event" class="w-40 my-5"></x-event-short-tab.small>
```

## navbar 
<x-navbar.bar ..."/>

Part of bar components is: <x-navbar.link .../> 

### Parameters
- logo: (**mandatory**) Name of navbar
- destinations: (**default events.index**) list of routes
- names: (**default Link**) list of names of links to destinations 
- icons: (**default view-list**) list of names of icons located in resources/views/components/icons, icons = svg images, will be on the left of name parameter

Values in list are separated by ' ' - one space 

Amount of links in bar depends on the smallest parameter(destinations, names, icons) eg. if names parameter has one name, then bar has one link.

Value at first position(before first space) corresponds to first value in other parameters...  

### Example usage
```html
<x-navbar.bar logo="Calendar" destinations="events.index dashboard" names="Events Dashboard" icons="view-list calendar"/>
```

## event-tab
<x-event-tab.side...

![x-event--tab.side](readme_res/event-tab-side/side.png)

### Parameter
- event: (**mandatory**) Event model variable


This element is to be found next to the calendar component and its purpose is to give user more detailed info about given event.

One can find there event's name, time, duration, place and what is perhaps the most important, number of still avaiable tickets.

This element also has an href which directs to the given event detailed view.

### Example usage
```html
<x-event-tab.side :event="$event"></x-event-tab.side>
```
