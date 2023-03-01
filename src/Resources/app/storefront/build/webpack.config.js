const { join, resolve } = require('path');

module.exports = () => {
    return {
        resolve: {
            alias: {
                '@threesixty': resolve(
                    join(__dirname, '..', 'node_modules','@3dweb')
                )
            }
        }
    }
}
