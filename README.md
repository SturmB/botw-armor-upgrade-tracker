## [The Legend of Zelda: Breath of the Wild Armor Upgrade Tracker][botw]

This tracker is designed as a tool to help you keep track of the resources you need to obtain in order to upgrade various armors to specific levels.

### How to Use

Unlike most GitHub projects, this isn't really meant to be downloaded, compiled, and run locally on your own computer. Although, if you are familiar with how to run [Laravel](https://laravel.com) projects locally, you certainly could do so. Instead, this is the source code for the [BotW Armor Tracker web app][botw] and a place for [bugs, feature suggestions, or other issues][issues] to be reported.

Simply make sure the armor you wish to track is checked, then adjust the slider below the name of the armor to specify which levels you are looking to upgrade it to. The resources and the quantity you will need for the upgrades are shown in the sidebar on the left. By default, all levels of all armors are tracked.

### Contributing

Please file all bug reports, issues, and feature requests using the [Issues][issues] tab above.

### TODO

There are several things that I need to address after launching this app.

- [x] Speed up SQL queries with Redis caching.
- [x] ~~Re-architect the app as a single Livewire component.~~ No need; I was able to reduce the number of queries from 247 to 16 on local without re-architecting.
- [x] Get Email working for password resets, email validation, etc.
- [x] Replace Jetstream branding on auth pages.
- [x] Add a "Select all" and "Deselect all" set of links near the top.
- [ ] Add a tri-state checkbox for each armor set to select/deselect all armors in that set.
- [ ] Replace the apparently abandoned [Livewire Range Slider](https://github.com/jantinnerezo/livewire-range-slider) with a pure-JavaScript usage of the [noUiSlider](https://refreshless.com/nouislider/).
- [x] Add a Dark Mode toggle next to the User Profile icon.
- [x] Add a loading spinner to appear during searches.
- [ ] Make the sliders accept variable min & max tiers.

[botw]: https://botw.armortracker.com
[issues]: https://github.com/SturmB/botw-armor-upgrade-tracker/issues
