Word Counter with Jquery / PHP
=================

During a job interview I was asked to do the following test:

Task: Create a tool for showing a user how many words are displayed on a web page

Outline: Create a word counter for a web page using HTML / jQuery / AJAX / PHP. You will need to code the following:

* HTML page accessible in the web browser
* A PHP script to return the results to the web page using AJAX

When a user visits the HTML page, they should be presented with a form to enter a URL of a web page. You only need to worry about http:// requests. When the user hits the submit button, your page should use jQuery to check that the input box is not empty. If it is empty, display a error message any way you like. If the user enters a valid string, use jQuery to make an AJAX call to your PHP script. Your PHP script should validate the string as well. If it is valid, retrieve the web page at that URL and count the number of words found in the <BODY> section. 

Examples:

> A page with the content <html><body>Hello</body></html> has a word count of 1
> A page with the content <html><head><title>I am a title</title></head><body>Body text</body></html> has a word count of 2, because the <title> is not in the <body>.

The word count should be the number of words that would normally be displayed if the URL was viewed using a web browser, so anything inside HTML tags should be ignored. If the URL provided is not active (i.e. a bad URL is provided by the user), then return a word count of zero. You can handle hyphens, apostrophes and comment sections any way you wish.

The word count should be returned to the user and displayed on the screen using jQuery.

Results
=========

I didn't get the job, but the project might be useful for someone.

Cheers.