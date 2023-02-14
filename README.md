This is a simple rent managment system made with PHP, JavaScript, TailwindCSS and MySQL database for persistence.

# Database Details

**host:** localhost <br />
**name:** rent-management <br />
**user:** root <br />
**password:**

This details can be changed in the Database class inside /src/database.

# Testing

You can test this application using the following users:

## Tenant

phone_number: 123456789011 <br />
password: 12345 

## Owner

phone_number: owner <br />
password: 12345

## Administrator

phone_number: administrator <br />
password: 12345 

# Notes

Inputs aren't validated, when testing, don't leave them empty or unexpected bugs may appear.

The chat is not Real-Time. Due to time constraints, I couldn't implement WebSockets but other than that it behaves like a normal chat. To send pictures/screenshots, you have to input the URL where the image resource is located and it will be parsed into HTML5.

# Endpoist

*/* <br />
*/login* <br />
*/payments* <br />
*/chat* <br />
*/chat/{chat_id}* <br />
*/tenants* <br />
*/rent* <br />
*/settings* <br />

Endpoist are protected. Some endpoints may have the same URL but redirect to diferent resources based on the user.

