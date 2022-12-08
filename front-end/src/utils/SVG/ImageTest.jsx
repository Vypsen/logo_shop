import React from 'react'
import PropTypes from 'prop-types'

const ImageTest = (src, alt, className) => {


    return(
        <img 
            src={src}
            alt={alt}
            className={className}
             />
    )
};

ImageTest.propTypes = {
    src: PropTypes.string,
    alt: PropTypes.string,
    classNames: PropTypes.string,
};

ImageTest.defaultProps = {
    src: 'https://via.placeholder.com/1248x346',
    alt: 'image name',
    classNames: ''
};

export default ImageTest