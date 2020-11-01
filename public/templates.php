<?php

// 予定がある時のlINEテンプレート
function getLineTemplate($results) {
  $array = [
      'type'      => 'flex',
      'altText'   => 'Today\'s Schedule',
      'contents'  => [
          'type'     => 'bubble',
          'size'     => 'mega',
          'header'   => [
              'type'          => 'box',
              'layout'        => 'vertical',
              'contents'      => [
                  [
                      'type'     => 'box',
                      'layout'   => 'baseline',
                      'contents' => [
                          [
                              'type'        => 'text',
                              'text'        => 'Today\'s',
                              'color'       => '#ffffff66',
                              'size'        => 'sm',
                          ],
                          [
                              'type'        => 'text',
                              'text'        => 'Schedule',
                              'color'       => '#ffffff',
                              'size'        => 'xl',
                              'flex'        => 4,
                              'weight'      => 'bold',
                              'align'       => 'start',
                              'offsetStart' => '25px'
                          ]
                      ]
                  ]
              ],
              'backgroundColor' => '#0367D3'
          ],
          'hero'  => [
              'type' => 'box',
              'layout' => 'vertical',
              'contents' => [
                  [
                      'type' => 'text',
                      'text' => date('m月d日').' ('.getWeek().')',
                      'size' => 'md',
                      'color' => '#b7b7b7',
                      'margin' => 'xl',
                      'offsetStart' => '20px'
                  ]
              ]
          ],  
          'body'  => [
              'type'      => 'box',
              'layout'    => 'vertical',
              'contents'  =>  getPlan($results)
          ]
          
      ]
  ];
  return $array;
}

// 予定がある時のLINEテンプレートのボディ
function getLineTemplateBody($start, $end, $summary) {
  $array = 
  [
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => [
          [
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' => [
                  [
                      'type' => 'text',
                      'text' => $start,
                      'size' => 'md',
                      'weight' => 'bold'
                  ],
                  [
                      'type' => 'box',
                      'layout' => 'vertical',
                      'contents' => [
                          [
                              'type' => 'filler'
                          ],
                          [
                              'type' => 'box',
                              'layout' => 'vertical',
                              'contents' => [],
                              'width' => '12px',
                              'height' => '12px',
                              'borderWidth' => '2px',
                              'borderColor' => '#EF454D',
                              'cornerRadius' => '30px'
                          ],
                          [
                              'type' => 'filler'
                          ]
                      ],
                      'flex' => 4
                  ]
              ],
              'spacing' => 'lg',
              'margin' => 'xl',
              'cornerRadius' => '30px'
          ],
          [
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' => [
                  [
                      'type' => 'box',
                      'layout' => 'vertical',
                      'contents' => [],
                      'margin' => '67px',
                      'width' => '2px',
                      'backgroundColor' => '#B7B7B7'
                  ],
                  [
                      'type' => 'box',
                      'layout' => 'vertical',
                      'contents' => [
                          [
                              'type' => 'text',
                              'text' => $summary,
                              'size' => 'sm',
                              'wrap' => true,
                              'align' => 'center'
                          ]
                      ],
                      'alignItems' => 'center',
                      'justifyContent' => 'center'    
                  ]
              ],
              'spacing' => 'lg',
              'height' => '50px'   
          ],
          [
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' => [
                  [
                      'type' => 'box',
                      'layout' => 'horizontal',
                      'contents' => [
                          [
                              'type' => 'text',
                              'text' => $end,
                              'size' => 'sm'
                          ]
                      ]
                  ],
                  [
                      'type' => 'box',
                      'layout' => 'vertical',
                      'contents' => [
                          [
                              'type' => 'filler'
                          ],
                          [
                              'type' => 'box',
                              'layout' => 'vertical',
                              'contents' => [],
                              'width' => '12px',
                              'height' => '12px',
                              'flex' => 4,
                              'cornerRadius' => '30px',
                              'borderWidth' => '2px',
                              'borderColor' => '#6486E3'
                          ],
                          [
                              'type' => 'filler'
                          ]
                      ],
                      'flex' => 4
                  ]
              ],
              'spacing' => 'lg',
              'cornerRadius' => '30px'
          ]
      ]
  ];
  return $array;
}

// 予定がない時のLINEテンプレート
function caseOfFree() {
  $array = [
      'type'      => 'flex',
      'altText'   => 'Today\'s Schedule',
      'contents'  => [
          'type'     => 'bubble',
          'size'     => 'mega',
          'header'   => [
              'type'          => 'box',
              'layout'        => 'vertical',
              'contents'      => [
                  [
                      'type'     => 'box',
                      'layout'   => 'baseline',
                      'contents' => [
                          [
                              'type'        => 'text',
                              'text'        => 'Today\'s',
                              'color'       => '#ffffff66',
                              'size'        => 'sm',
                          ],
                          [
                              'type'        => 'text',
                              'text'        => 'Schedule',
                              'color'       => '#ffffff',
                              'size'        => 'xl',
                              'flex'        => 4,
                              'weight'      => 'bold',
                              'align'       => 'start',
                              'offsetStart' => '25px'
                          ]
                      ]
                  ]
              ],
              'backgroundColor' => '#0367D3'
          ],
          'hero'  => [
              'type' => 'box',
              'layout' => 'vertical',
              'contents' => [
                  [
                      'type' => 'text',
                      'text' => date('m月d日').' ('.getWeek().')',
                      'size' => 'md',
                      'color' => '#b7b7b7',
                      'margin' => 'xl',
                      'offsetStart' => '20px'
                  ]
              ]
          ],  
          'body'  => [
              'type'      => 'box',
              'layout'    => 'vertical',
              'contents'  =>  [
                  [
                      'type' => 'text',
                      'text' => '本日の予定はありません',
                      'size' => 'sm',
                      'align' => 'center'
                  ]
              ]
          ]
          
      ]
  ];
  return $array;
}