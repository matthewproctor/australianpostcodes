# australianpostcodes
A community sourced comprehensive database of Australian Post Codes with geolocation data.

## How it started
Some years ago, Australia Post used to publish a full list of Australian Postal Codes including state and location data, in a raw data format, completely free.

They have since stopped doing this, instead preferring to charge for data that is arguably public domain, or at least available publicly in many different forms from many different providers.

I've needed this data for a number of projects over the years, and have collated as much publicly-available postal data as I could find. There are a bunch of files out on the internet with this data, but they are all missing data or detail, so I've tried to collate them as best I can.

You can learn more about this at http://www.matthewproctor.com/australian_postcodes

## Data Files
The postcode data files are stored as CSV, and available on my site in XLS, XLSX and other formats. Column definitions are shown below.

| Fieldname | Description |
| --- | --- |
| postcode |	The postcode in numerical format - 0000 to 9999 |
| locality |	The locality of the postcode - typically the city/suburb or postal distribution centre |
| state |	The Australian state in which the locality is situated |
| long |	The longitude of the locality - defaults to 0 when not available |
| lat |	The latitude of the locality - defaults to 0 when not available |
| dc1 |	The Australia Post distribution Centre servicing this postcode - defaults to blank when not available |
| type1 |	The of locality, such as a delivery area, post office or a "Large Volume Recipient" such as a GPO, defaults to blank when not available |
| status |	A note indicating whether the data is new, removed or updated - new column Nov 2018 |



## How to contribute
All contributions are welcome!!! You have a few options:
1. Submit a Pull Request
2. Lodge an Issue on this repo, and I'll update the file
3. Send me a message (email, twitter dm, etc.)

## Pull Requests
Please submit any pull requests that you feel are useful to add, edit or delete data from this database.  Your contributions are essential to help keep this database up to date.

## Australia Post Databases
From time to time, friendly people help submit changes that they see from the official Australia Post database.  I dont have the funds to buy this database myself, and technically it's not meant to be republished, but I'm confident this repository has the most up to date publically sourced set of postal data available.
