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
- event: **mandatory** | Event model variable
- color: **default 0** | Used to change color palette, available palettes below
- class: **optional** | Any css classes

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
