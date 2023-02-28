const { join, resolve } = require('path');

module.exports = () => {
    return {
        resolve: {
            alias: {
                '@3dweb': resolve(
                    join(__dirname, '..', 'node_modules','@3dweb', '360javascriptviewer')
                )
            }
        }
    }
}
