# Forest - WordPress Site Editor and Block Theme

**Forest** is a WordPress Site Editor and block theme designed to provide a flexible and customisable framework for building WordPress sites. It leverages the latest WordPress features to offer a seamless editing experience.

## Project Overview

Forest is a modern WordPress theme built with Full Site Editing (FSE) capabilities. It is designed to be highly customisable, allowing developers to easily adapt it to their specific needs. 

## Features

- **Full Site Editing (FSE):** Leverage WordPress's latest FSE capabilities for complete control over your site's design.
- **Grunt Automation:** Utilize Grunt for efficient task management, including SASS compilation, image optimiszation, and JavaScript minification.

## Getting Started

### Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/tim-green/forest-wp-fse.git
   cd forest-wp-fse
   ```

2. **Install Node.js Dependencies:**

   Ensure you have Node.js installed, then run:

   ```bash
   npm install
   ```

3. **Set Up WordPress:**

   - Install WordPress on your local server.
   - Copy the `forest-wp-fse` theme folder to your WordPress `wp-content/themes` directory.

### Usage

1. **Activate the Theme:**

   - Navigate to the WordPress admin dashboard.
   - Go to `Appearance > Themes`.
   - Activate the "Forest" theme.

2. **Run Grunt Tasks:**

   For development, start watching for changes:

   ```bash
   npm run watch
   ```

   This command will automatically handle SASS compilation, JavaScript minification, and other tasks as you develop.

---

© 2023-present [Tim Green](https://github.com/tim-green/forest-wp-fse)