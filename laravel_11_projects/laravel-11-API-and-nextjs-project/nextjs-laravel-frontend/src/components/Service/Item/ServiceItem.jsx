import Link from 'next/link';
import React from 'react';

const ServiceItem = ({ data,number}) => {
  
    return (
        <div className='service-item p-8 bg-white rounded-lg border border-line hover-box-shadow'>

            <Link className='service-item-main h-full' href={'/service/service-details/[slug]'}
            as={`/service/service-details/${data.service_name.toLowerCase().replace(/ /g,'-')}`}
            >
 
            <div className='heading flex items-center justify-between'>
                <i className={`${data.icon} text-blue md:text-6xl text-5xl` }></i>
                <div className='number heading3 text-placehover text-slate-400'>
                {number + 1}
                </div> 
            </div>
            <div className='heading6 hover:text-blue duration-300 mt-6'>
                {data.service_name}
                </div>
                <div className='text-secondary mt-2'>
                {data.service_short}
                </div>

            </Link>
           
        </div>
    );
};

export default ServiceItem;