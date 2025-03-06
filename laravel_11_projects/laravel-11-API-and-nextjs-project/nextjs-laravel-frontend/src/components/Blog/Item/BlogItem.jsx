import Image from 'next/image';
import Link from 'next/link';
import React from 'react';
import * as Icon from '@phosphor-icons/react/dist/ssr'
import { IMAGE_BASE_URL } from '@/config/config';

const BlogItem = ({data,key}) => {
 
    const formattedDate = new Date(data.created_at).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });



    return (
        <div className='blog-item'>
            <Link className='blog-item-main h-full block bg-white border border-line overflow-hidden rounded-2xl hover-box-shadow duration-500' href={'/blog/blog-details/[slug]'}
            as={`/blog/blog-details/${data.post_slug.toLowerCase().replace(/ /g,'-')}`}>


            <div className='bg-img w-full overflow-hidden'>
                <Image width={5000} height={5000} className='w-full h-full block' src={`${IMAGE_BASE_URL}/${data.image}`} alt={data.post_title} /> 
            </div>

        <div className='infor sm:p-6 p-4'>
            <div className='caption2 py-1 px-3 bg-surface rounded-full inline-block capitalize bg-blue-100'>
            {data.category_name }  </div>
        <div className='heading6 mt-2'> {data.post_title} </div>

        <div className='date flex items-center gap-4 mt-2'>
            <div className='author caption2 text-secondary'>
            by <span className='text-on-surface'>Admin</span>
            </div>
            <div className='item-date flex items-center'>
                <Icon.CalendarBlank weight='bold'/>
                <span className='ml-1 caption2'>{formattedDate}</span>

            </div> 
        </div> 
        </div> 
            </Link>
             
        </div>
    );
};

export default BlogItem;