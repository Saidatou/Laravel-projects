import React from 'react';
import { BounceLoader  } from 'react-spinners' 

const Loader = () => {
    return (
        <div className='w-full h-screen flex justify-center items-center'>
            <BounceLoader color='#09f' size={60} />  
        </div>
    );
};

export default Loader;