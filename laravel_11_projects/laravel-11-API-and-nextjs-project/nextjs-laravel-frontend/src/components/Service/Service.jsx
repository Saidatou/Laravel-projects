'use client'
import { useInView } from 'framer-motion';
import React, { useEffect, useRef, useState } from 'react';
import ServiceItem from './Item/ServiceItem';
import { API_BASE_URL } from '@/config/config';
import ClipLoader from 'react-spinners/ClipLoader';
const Service = ( ) => {

    const ref = useRef(null)
    const isInView = useInView(ref, {once: true})

    const [services, setServices] = useState([]);
    const [loading, setLoading] = useState(true);
    // console.log(services)

    useEffect(() => {
        const fetchItem = async () => {
            try {
                const response = await fetch(`${API_BASE_URL}/services`);
                const data = await response.json();
                setServices(data);
            } catch (error) {
                console.error('Error fetching data',error);
            } finally {
                setLoading(false);
            }
        };
        fetchItem();
    },[]);



    return (
<div>
    <section className='service-block lg:mt-[100px] sm:mt-16 mt-10 mb-6' ref={ref}>
        <div className='container'>
            <h3 className='heading3 text-center'>Our Sevices</h3>
            
    {
        loading ? ( 
            <div className='flex justify-center items-center h-[500px]'>
            <ClipLoader color='#3498db' size={50} />
        </div>
        ): (
    <div className='list-service grid lg:grid-cols-3 sm:grid-cols-2 gap-8 md:mt-10 mt-6 gap-y-10' style={{ transform: isInView ? "none" : 'translateY(60px)', opacity: isInView ? 1 : 0, transition: 'all 0.7s cubic-bezier(0.17, 0.55, 0.55,1) 0.3s', }}>
                    {
                        services.slice(0,6).map((item, index) => (
                            <ServiceItem data={item} key={index} number={index} />
                        ))
                    }

                </div>
        )
    }        
            

        </div>

    </section>
    
</div>
    );
};

export default Service; 