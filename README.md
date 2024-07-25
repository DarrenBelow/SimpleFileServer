# Simple File Server

This project is a simple file server built with PHP that allows users to browse and download files from a specified directory. It also generates a QR code for easy access from mobile devices.

## Requirements

- [Download PHP](https://www.php.net/downloads)
- Extract the PHP zip file and place the contents into the `php` folder you need to create within this project directory.

## Setup

1. **Download PHP**:
   - Go to the [official PHP website](https://www.php.net/downloads) and download the latest stable version of PHP for Windows.
   - Extract the ZIP file to the `php` folder inside this project directory.

2. **Verify Directory Structure**:
   Ensure your project directory looks like this:  
project_folder/  
├── files/  
│ └── ... files you want to show  
├── php/  
│ ├── ext/  
│ ├── php.exe  
│ ├── php.ini  
│ └── ... (other necessary PHP files)  
├── phpqrcode/  
│ ├── qrlib.php  
│ └── ... (other files from the phpqrcode library)  
├── index.php  
└── server.bat  


3. **Run the Server**:
- Double-click `server.bat` to start the server. This will open a command prompt and start the PHP built-in server.
- The server will be reachable at `http://your_computer_ip:8000`.

4. **Accessing the Server**:
- Open your web browser and navigate to `http://your_computer_ip:8000` to view the file server.
- Scan the QR code displayed on the webpage using your phone or tablet to load the file server on your mobile device.

**Features**
- Lists files and folders in the specified directory.
- Allows files to be opened directly in the browser.
- Displays a QR code for easy access from mobile devices.

**License**
This project is licensed under the MIT License.


This `README.md` file provides detailed instructions for setting up and running the simple file server project. It explains the requirements, setup process, server running instructions, and features of the project.
