# Matchbox Core Features

A modern WordPress plugin scaffold for Matchbox WordPress projects.

## Requirements

- PHP 8.2 or higher
- WordPress 6.6 or higher
- Node.js 22.0 or higher
- Composer

## Development

### Available Scripts

- `npm run build` - Build the plugin assets
- `npm run start` - Start the development server with hot reloading
- `npm run format` - Format code using WordPress coding standards
- `npm run lint:css` - Lint CSS files
- `npm run lint:js` - Lint JavaScript files
- `npm run plugin-zip` - Create a distributable plugin zip file

### Project Structure

```txt
matchbox-core-features/
├── src/                        # PHP source files
│   └── class-corefeatures.php  # Main plugin class
├── dist/                       # Built assets
├── core-features.php           # Plugin bootstrap file
├── composer.json               # PHP dependencies
├── package.json                # Node.js dependencies
└── README.md                   # This file
```

### Plugin Architecture

The plugin follows modern WordPress development practices:

- PSR-4 autoloading
- Namespaced PHP classes
- Modern JavaScript build process
- WordPress coding standards
- Composer for dependency management

### Adding Features

1. Create new PHP classes in the `src/` directory.
2. Add JavaScript files in the `src/` directory.
3. Register hooks and filters in the `Core_Features` class.
4. Build assets using `npm run build`.

## Credits

Developed by [Matchbox](https://matchboxdesigngroup.com).
