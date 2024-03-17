I just did some minor updates to this repository and added a PHP import script.

# Australian Post Codes

A community sourced comprehensive database of Australian Post Codes with geolocation data.

## How it started

Some years ago, Australia Post used to publish a full list of Australian Postal Codes including state and location data, in a raw data format, completely free.

They have since stopped doing this, instead preferring to charge for data that is arguably public domain, or at least available publicly in many different forms from many different providers.

I've needed this data for a number of projects over the years, and have collated as much publicly-available postal data as I could find. There are a bunch of files out on the internet with this data, but they are all missing data or detail, so I've tried to collate them as best I can.

You can learn more about this at http://www.matthewproctor.com/australian_postcodes

## Data Files

The postcode data files are stored as CSV, and available on my site in XLS, XLSX and other formats. Column definitions are shown below.

| Fieldname         | Description                                                                                                                                  |
| ----------------- | -------------------------------------------------------------------------------------------------------------------------------------------- |
| postcode          | The postcode in numerical format - 0000 to 9999, for example "3000 "                                                                         |
| locality          | The locality of the postcode - typically the city/suburb or postal distribution centre                                                       |
| state             | The Australian state in which the locality is situated                                                                                       |
| long              | The longitude of the locality - defaults to 0 when not available                                                                             |
| lat               | The latitude of the locality - defaults to 0 when not available                                                                              |
| dc1               | The Australia Post distribution Centre servicing this postcode - defaults to blank when not available                                        |
| type1             | The type of locality, such as a delivery area, post office or a "Large Volume Recipient" such as a GPO, defaults to blank when not available |
| SA3               | The SA3 Statistical Area code                                                                                                                |
| SA3 Name          | The name of the SA3 Statistical Area                                                                                                         |
| SA4               | The SA4 Statistical Area code                                                                                                                |
| SA4 Name          | The name of the SA4 Statistical Area                                                                                                         |
| Region            | Designated Regional Area                                                                                                                     |
| status            | A note indicating whether the data is new, removed or updated                                                                                |
| CED               | The Commonwealth Electroal Division                                                                                                          |
| Altitude          | Altitude/Elevation (meters)                                                                                                                  |
| Charge Zone       | Australia Post Charge Zones                                                                                                                  |
| PHN Code          | Primary Health Network Code                                                                                                                  |
| PHN Code          | Primary Health Network Name                                                                                                                  |
| Lat_precise       | Latitude from Google Maps API                                                                                                                |
| Long_precise      | Longitude from Google Maps API                                                                                                               |
| SA1 Code 2021     | Statistical Area 1 2021 Code                                                                                                                 |
| SA1 Name 2021     | Statistical Area 1 2021 Name                                                                                                                 |
| SA2 Code 2021     | Statistical Area 2 2021 Code                                                                                                                 |
| SA2 Name 2021     | Statistical Area 2 2021 Name                                                                                                                 |
| SA3 Code 2021     | Statistical Area 3 2021 Code                                                                                                                 |
| SA3 Name 2021     | Statistical Area 3 2021 Name                                                                                                                 |
| SA4 Code 2021     | Statistical Area 4 2021 Code                                                                                                                 |
| SA4 Name 2021     | Statistical Area 4 2021 Name                                                                                                                 |
| RA 2011           | Remoteness Area - 2011 Dataset                                                                                                               |
| RA 2016           | Remoteness Area - 2016 Dataset                                                                                                               |
| MMM 2016          | Modified Monash Model - 2016 Dataset                                                                                                         |
| MMM 2019          | Modified Monash Model - 2019 Dataset                                                                                                         |
| LGA Region        | Local Government Area                                                                                                                        |
| Electorate        | Federal Government Electorate                                                                                                                |
| Electorate Rating | Federal Government Demographic Rating                                                                                                        |
| State Electroal Division Code     | State Government Electorate Code                                                                                             |
| State Electroal Division Name        | State Government Electorate Name                                                                                          |

## How to contribute

All contributions are welcome!!! You have a few options:

1. Submit a Pull Request
2. Lodge an Issue on this repo, and I'll update the file
3. Send me a message (email, twitter dm, etc.)


<p align="left"> <a href="https://github.com/ryo-ma/github-profile-trophy"><img src="https://github-profile-trophy.vercel.app/?username=matthewproctor" alt="matthewproctor" /></a> </p>

<p align="left"> <a href="https://twitter.com/mattproctorau" target="blank"><img src="https://img.shields.io/twitter/follow/mattproctorau?logo=twitter&style=for-the-badge" alt="mattproctorau" /></a> </p>

<h3 align="left">Connect with me:</h3>
<p align="left">
<a href="https://twitter.com/mattproctorau" target="blank"><img align="center" src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/twitter.svg" alt="mattproctorau" height="30" width="40" /></a>
<a href="https://linkedin.com/in/matthewrproctor" target="blank"><img align="center" src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/linked-in-alt.svg" alt="matthewrproctor" height="30" width="40" /></a>
<a href="https://stackoverflow.com/users/2276431" target="blank"><img align="center" src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/stack-overflow.svg" alt="2276431" height="30" width="40" /></a>
<a href="https://www.youtube.com/c/uc5pb9o0oekskmmpi1r3gpda" target="blank"><img align="center" src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/youtube.svg" alt="uc5pb9o0oekskmmpi1r3gpda" height="30" width="40" /></a>
</p>


## Pull Requests

Please submit any pull requests that you feel are useful to add, edit or delete data from this database. Your contributions are essential to help keep this database up to date.

## Australia Post Databases

From time to time, friendly people help submit changes that they see from the official Australia Post database. I dont have the funds to buy this database myself, and technically it's not meant to be republished, but I'm confident this repository has the most up to date publically sourced set of postal data available.

## NOTES on the SQL File

As long and type are reserved words in MySQL, it's been addressed directly in the insert query, so you may need to update that in insert script in the php import tool.

Also, you may need to clean the data a little more that comes from the original CSV source as it contained multiple entries of ""NAME"" instead of "NAME", which tends to break things like this on CSV imports.
